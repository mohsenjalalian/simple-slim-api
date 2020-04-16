###################################################################### common

FROM php:7.3.12-cli

RUN apt-get update \
    && apt-get install git zip unzip supervisor vim zsh htop iputils-ping wget sudo cron -y

RUN docker-php-ext-install pdo_mysql bcmath sockets
RUN apt install -y libxml2-dev

RUN docker-php-ext-install xmlrpc

# install composer
RUN curl https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /src
