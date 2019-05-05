FROM alpine:edge
MAINTAINER gjchen <gjchen.tw@gmail.com>

RUN apk add composer

RUN apk --update add \
    alpine-sdk \
    openssl-dev \
    php7-pear \
    php7-dev \
    && rm -rf /var/cache/apk/*

RUN pecl install mongodb \
    && pecl clear-cache

RUN echo "extension=mongodb.so" > /etc/php7/conf.d/mongodb.ini

RUN mkdir -p /var/www

WORKDIR /var/www

COPY . /var/www

#RUN composer install
