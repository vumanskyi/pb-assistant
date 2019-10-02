FROM phpdockerio/php73-fpm:latest

MAINTAINER Vlad Umanskyi <vladumanskyi.com>

RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.3-mysql \
    php7.3-fpm \
    php7.3-apcu \
    php7.3-ctype \
    php7.3-curl \
    php7.3-dom \
    php7.3-gd \
    php7.3-iconv \
    php7.3-imagick \
    php7.3-json \
    php7.3-intl \
    php7.3-fileinfo\
    php7.3-mbstring \
    php7.3-opcache \
    php7.3-pdo \
    php7.3-mysqli \
    php7.3-xml \
    php7.3-phar \
    php7.3-tokenizer \
    php7.3-simplexml \
    php7.3-xdebug \
    php7.3-zip \
    php7.3-xmlwriter

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*