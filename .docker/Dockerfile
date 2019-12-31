FROM php:7.3.4-cli-alpine

RUN curl --silent https://getcomposer.org/composer.phar > /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

# Install pcov
RUN apk add --no-cache --virtual .build-deps \
    g++ make autoconf yaml-dev

RUN pecl channel-update pecl.php.net
RUN pecl install pcov && docker-php-ext-enable pcov

RUN apk del --purge .build-deps

WORKDIR /var/jsg