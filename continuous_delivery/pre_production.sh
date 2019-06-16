#!/usr/bin/env bash

: '
    Este arquivo contém os scripts para clonar ou atualizar a aplicação do repositório do Gitlab para no servidor.
    Atenção! É necessário que as chaves SSH estejam devidamente configuradas entre (GITLAB - SERVER) (GITLAB CI - SERVER).
    O servidor DNS deve estar devidamente configurado para redirecionar qualquer subdomínio para o domínio principal
    Domínio http://review3.infocorpjr.com
'

PROJECT="3 - NEPES"
DOMAIN="nepes.infocorpjr.com"
GIT_BRANCH="pre_production "
GIT_REMOTE_SSH="git@gitlab.com:infocorp/nepes.git"
SLACK_WEBHOOK="https://hooks.slack.com/services/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"
MESSAGE="
{
    \"attachments\": [
        {
            \"pretext\": \"O projeto *$PROJECT* foi para pré produção!\",
            \"color\": \"#36a64f\",
            \"title\": \"http://$DOMAIN\",
            \"title_link\": \"http://$DOMAIN\",
            \"text\": \"A validação deve ser feito pelo P.O. do projeto antes de ser enviado para produção\",
        }
    ]
}
"

sudo rm /var/www/$DOMAIN -R

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
    git clone -b $GIT_BRANCH $GIT_REMOTE_SSH $DOMAIN
    cd $DOMAIN

    # VARIÁVEIS DE AMBIENTE
    cp .env.pre_production .env

    # COMPOSER
    composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts

    # NPM
    npm ci && npm run prod

    # BANCO DE DADOS & STORAGE
    touch storage/database.sqlite && php artisan migrate --force --seed

    # OUTRAS CONFIGURAÇÕES DA APLICAÇÃO
    php artisan key:generate && php artisan storage:link
    sudo chown www-data:www-data storage -R
    curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" $SLACK_WEBHOOK
    exit
fi
