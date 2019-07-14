#!/usr/bin/env bash

: '
    Este arquivo contém os scripts para clonar ou atualizar a aplicação do repositório do Gitlab para no servidor.
    Atenção! É necessário que as chaves SSH estejam devidamente configuradas entre (GITLAB - SERVER) (GITLAB CI - SERVER).
    O servidor DNS deve estar devidamente configurado para redirecionar qualquer subdomínio para o domínio principal
    Domínio http://review5.infocorpjr.com
'

PROJECT="G - MARATONA"
DOMAIN="review5.infocorpjr.com"
GIT_BRANCH="master"
GIT_REMOTE_SSH="git@gitlab.com:infocorp/g-maratona.git"
MESSAGE="
{
    \"attachments\": [
        {
            \"pretext\": \"Olá, tem algo novo do projeto *$PROJECT*\",
            \"color\": \"#36a64f\",
            \"title\": \"http://$DOMAIN\",
            \"title_link\": \"http://$DOMAIN\",
            \"text\": \"Acesse o link acima para verificar e validar as alterações\",
        }
    ]
}
"

# Verifica se o diretório do projeto já está disponivel no servidor de revisão
# Atenção, as configurações de subdomínio devem estar prontas no servidor de DNS.
if [ -d /var/www/$DOMAIN ]; then
    cd /var/www/$DOMAIN
    sudo chown $USER:$USER ./ -R
    git fetch --all
    git reset --hard origin/master

    # VARIÁVEIS DE AMBIENTE
    cp .env.review .env

    # COMPOSER
    if [ -d vendor ]; then sudo rm vendor -R; fi
    composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts

    # NPM
    # if [ -d node_modules ]; then sudo rm node_modules -R; fi
    # npm ci && npm run prod

    # BANCO DE DADOS & STORAGE
    if [ -f database/database.sqlite ]; then
        sudo rm database/database.sqlite
    fi

    sudo touch database/database.sqlite && sudo php artisan migrate:fresh --seed

    # OUTRAS CONFIGURAÇÕES DA APLICAÇÃO
    php artisan key:generate && php artisan storage:link
    php artisan queue:restart
    sudo chown www-data:www-data ./ -R
    curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" $SLACK_WEBHOOK_HOMOLOG
    exit
fi

# Se o diretório não existe ...
if [ ! -d /var/www/$DOMAIN ]; then
    # CONFIGURAÇÕES DE SUBDOMÍNIO NO APACHE
    sudo echo "
    <VirtualHost *:80>
        ServerAdmin suporte@infocorp.ic.ufmt.br
        ServerName ${DOMAIN}
        ServerAlias www.${DOMAIN}
        DocumentRoot /var/www/${DOMAIN}/public
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
        <Directory /var/www/${DOMAIN}/public>
            Allowoverride All
        </Directory>
    </VirtualHost>" | sudo tee /etc/apache2/sites-available/$DOMAIN.conf
    sudo a2ensite $DOMAIN
    sudo /etc/init.d/apache2 restart
    cd /var/www/
    # Neste caso o sudo permite a execução se sem senha
    sudo mkdir $DOMAIN
    cd $DOMAIN
    sudo chown $USER:$USER . -R

    git clone -b $GIT_BRANCH $GIT_REMOTE_SSH .

    # VARIÁVEIS DE AMBIENTE
    cp .env.review .env

    # COMPOSER
    composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts

    # NPM
    # npm ci && npm run prod

    # BANCO DE DADOS & STORAGE
    touch database/database.sqlite && php artisan migrate --seed

    # OUTRAS CONFIGURAÇÕES DA APLICAÇÃO
    php artisan key:generate && php artisan storage:link
    php artisan queue:restart
    sudo chown www-data:www-data storage -R
    curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" "$SLACK_WEBHOOK_HOMOLOG"
    exit
fi
