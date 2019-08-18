#!/usr/bin/env bash

: ' -------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------

ATENÇÃO! Este arquivo de script é responsável somente pela atualização da aplicação no servidor, todas as configurações
adicionais devem ser feitas manualmente, tendo e vista que a aplicação está em produção !!!! Do not be a bitch. 

-----------------------------------------------------------------------------------------------------------------------'

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
# Coloca a aplicação em modo de manutenção
php artisan down
# IMPORTANTE! Muda o proprietário dos subdiretório para o usuário atual, sem isso, pode haver erro de permissão
# na atualização e configuração da aplicação.
sudo chown $USER:$USER ./ -R
# Atualiza o repositório da aplicação com o repositório remoto
git fetch origin
git checkout production
git reset --hard origin/production
git pull origin production
# COMPOSER
composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts
# Copia o arquivo de configurações da aplicação
cp .env.production .env
# Gera uma nova chave para a aplicação
php artisan key:generate
# Adiciona a informações do email usado para enviar notificações via email para os usuários.
php artisan env:set MAIL_USERNAME=$MAIL_USERNAME
php artisan env:set MAIL_PASSWORD=$MAIL_PASSWORD
# Adiciona informações sobre os usuários padrão da aplicação
php artisan env:set ADMIN_EMAIL=$ADMIN_EMAIL
php artisan env:set ADMIN_PASSWORD=$ADMIN_PASSWORD
# Executa a migração no banco.
php artisan migrate
# Altera o proprietário do diretório
sudo chown www-data:www-data . -R
# Sobe a aplicação novamente
php artisan up
# Notificação do slack
curl -X POST -H 'Content-type: application/json' --data "$MESSAGE" "$SLACK_WEBHOOK"
exit
