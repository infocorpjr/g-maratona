#!/usr/bin/env bash

# O subdomínio para o projeto, sem o 'wwww', esse subdomínio também
# será o nome do projeto dentro do '/var/www'
DOMAIN="maratona.infocorpjr.com"
# O endereço do repositório
GIT_REMOTE_SSH="git@gitlab.com:infocorp/g-maratona.git"
# A mensagem que será enviada para o slack, veja mais detalhes de formatação em:
# https://api.slack.com/docs/message-formatting
MESSAGE="
{
    \"attachments\": [
        {
            \"pretext\": \" *Maratona de Programação* está no servidor de *Produção* \",
            \"color\": \"#36a64f\",
            \"title\": \"http://$DOMAIN\",
            \"title_link\": \"http://$DOMAIN\",
            \"text\": \"Acesse o link acima para verificar e validar as alterações\",
        }
    ]
}
"
# Muda para o dirtório padrão dos projetos no servidor
cd /var/www/$DOMAIN
sudo chown $user:$user ./ -R
sudo chown $user:www-data ./storage/ -R
# Ataulizada o repositório da aplicação
git checkout production $GIT_REMOTE_SSH .
git pull origin production $GIT_REMOTE_SSH .
# COMPOSER
composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts
# Configuracoes de ambiente
rm .env
cp .env.production .env
php artisan key:generate

# Adiciona a senha do email
php artisan env:set MAIL_USERNAME=$MAIL_USERNAME
php artisan env:set MAIL_PASSWORD=$MAIL_PASSWORD

# Adiciona a senha do email para o admin
php artisan env:set ADMIN_EMAIL=$ADMIN_EMAIL
php artisan env:set ADMIN_PASSWORD=$ADMIN_PASSWORD

# BANCO DE DADOS & STORAGE
if [ ! -d /var/www/$DOMAIN/database/database.sqlite ]; then
  # VARIÁVEIS DE AMBIENTE
  touch database/database.sqlite
  # Quando e producao executa so o usuario admin
  php artisan migrate --seed
fi

php artisan storage:link
php artisan migrate

# Altera o proprietário do diretório
sudo chown www-data:www-data database -R
sudo chown www-data:www-data storage -R

# Notificação do slack
curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" "$SLACK_WEBHOOK"
exit