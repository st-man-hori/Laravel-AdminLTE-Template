FROM php:8.1-apache

ARG USER_UID
ARG USER_GID

# WSL2の権限問題解消のためUID,GIDを指定できるようにする
RUN groupadd --gid ${USER_GID} docker \
 && useradd --uid ${USER_UID} --gid ${USER_GID} -m docker \
 && apt-get update \
 && apt-get install -y sudo \
 && echo docker ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/docker \
 && chmod 0440 /etc/sudoers.d/docker

RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libonig-dev \
curl \
libmagickwand-dev \
&& docker-php-ext-install pdo_mysql gd exif fileinfo

RUN pecl install imagick && docker-php-ext-enable imagick


RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

COPY ./docker/php/php.ini /usr/local/etc/php

WORKDIR /var/www/html