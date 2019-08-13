#!/usr/bin/env bash

# O subdomínio para o projeto, sem o 'wwww', esse subdomínio também
# será o nome do projeto dentro do '/var/www'
DOMAIN="review5.infocorpjr.com"
# O endereço do repositório
GIT_REMOTE_SSH="git@gitlab.com:infocorp/g-maratona.git"
# A mensagem que será enviada para o slack, veja mais detalhes de formatação em:
# https://api.slack.com/docs/message-formatting
MESSAGE="
{
    \"attachments\": [
        {
            \"pretext\": \" *Maratona de Programação* está no servidor de homologação \",
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
    # Faz a ativação do site e reinicia o servidor
    sudo a2ensite $DOMAIN && sudo /etc/init.d/apache2 restart
    # Muda para o dirtório padrão dos projetos no servidor
    cd /var/www/
    # Cria o diretório do projeto, mudara para o diretório e altera as permissões de pripriedade ...
    sudo mkdir $DOMAIN && cd $DOMAIN && sudo chown $USER:$USER . -R
    # Clona o repositório da aplicação
    git clone -b master $GIT_REMOTE_SSH .
    # VARIÁVEIS DE AMBIENTE
    cp .env.deploy .env
    # COMPOSER
    composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts
    # BANCO DE DADOS & STORAGE
    touch database/database.sqlite && php artisan migrate --seed
    # OUTRAS CONFIGURAÇÕES DA APLICAÇÃO
    php artisan key:generate && php artisan storage:link && php artisan queue:restart
    # Adiciona a senha do email para o arquivo de configurações
    php artisan env:set MAIL_PASSWORD=$MAIL_PASSWORD
    # Altera de desenvolvimeto para produção no arquivo de configuração, isso é necessário pois alguns comandos
    # do artisan não são executados se a aplicação estiver em modo de desenvolvimento
    php artisan env:set APP_ENV=production
    # Altera o proprietário do diretório
    sudo chown www-data:www-data storage -R
    # Notificação do slack
    curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" "$SLACK_WEBHOOK"
    exit
fi
