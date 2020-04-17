###################################################################### common

FROM php:7.3.12-fpm

RUN apt-get update \
    && apt-get install git zip unzip vim zsh htop iputils-ping wget sudo cron -y

RUN docker-php-ext-install pdo_mysql bcmath sockets

# install oh-my-zsh
RUN wget https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh -O - | zsh || true
RUN echo "alias llq=\"ls -lah\"" >> ~/.zshrc

RUN apt install -y libxml2-dev

RUN docker-php-ext-install xmlrpc

# create php.ini
COPY ./docker/slim-api-php-fpm/php.ini /usr/local/etc/php/php.ini

# create www.conf
COPY ./docker/slim-api-php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

# disable access log
COPY ./docker/slim-api-php-fpm/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# install composer
RUN curl https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /src
