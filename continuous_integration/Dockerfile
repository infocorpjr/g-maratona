FROM ubuntu:latest

MAINTAINER Suporte Infocorp <suporte@infocorp.ic.ufmt.br>

ENV DEBIAN_FRONTEND=noninteractive

# Atualiza os repositórios e pacotes do sistema operacional
RUN apt update -y && apt upgrade -y &&\
    # Instalação de pacotes necessários
    apt install -y curl zip unzip gnupg \
        build-essential libpng-dev \
        openssh-client \
        git \
        apache2 \
        # PHP 7.2 e extensões
        php7.2 php7.2-mysql php7.2-xml php7.2-mbstring php7.2-curl php7.2-json php7.2-gd php7.2-sqlite3 php7.2-zip \
        # Chromium para testes e2e
        chromium-browser &&\
    # Instalação do NodeJS
    curl -sL https://deb.nodesource.com/setup_11.x | bash - &&\
    apt-get install -y nodejs &&\
    # Instalação e configuração do Composer
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia configurações para o container
COPY etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY etc/apache2/apache2.conf /etc/apache2/apache2.conf

WORKDIR /var/www

# Inicia o apache
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]

EXPOSE 80
