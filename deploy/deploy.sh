#!/usr/bin/env bash

: '
    Deploy to HOMOLOG
'

echo $0 $1

DOMAIN="review5.infocorpjr.com"
GIT_REMOTE_SSH="git@gitlab.com:infocorp/g-maratona.git"
SLACK_WEBHOOK="ADICIONAR HOOK"

MESSAGE="
{
    \"attachments\": [
        {
            \"pretext\": \"Olá! Tem algo novo do projeto *Maratona de Programação*\",
            \"color\": \"#36a64f\",
            \"title\": \"http://$DOMAIN\",
            \"title_link\": \"http://$DOMAIN\",
            \"text\": \"Acesse o link acima para verificar e validar as alterações\",
        }
    ]
}
"

# Remove o diretório da aplicação
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
    # Faz a ativação do site
    sudo a2ensite $DOMAIN
    # Reinicia o servidor para carregar as configurações
    sudo /etc/init.d/apache2 restart
    # Muda para o dirtório padrão dos projetos no servidor
    cd /var/www/
    # Neste caso o sudo permite a execução sem senha
    sudo mkdir $DOMAIN && cd $DOMAIN
    # Altera o proprietário do diretório
    sudo chown $USER:$USER . -R
    # Clona o repositório da aplicação
    git clone -b master $GIT_REMOTE_SSH .
    # VARIÁVEIS DE AMBIENTE
    cp .env.deploy .env
    # COMPOSER
    composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts
    # NPM
    # npm ci && npm run prod
    # BANCO DE DADOS & STORAGE
    touch database/database.sqlite && php artisan migrate --seed
    # OUTRAS CONFIGURAÇÕES DA APLICAÇÃO
    php artisan key:generate && php artisan storage:link && php artisan queue:restart
    sudo chown www-data:www-data storage -R
    curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" "$SLACK_WEBHOOK"
    exit
fi
