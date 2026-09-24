FROM php:8.4-apache
RUN docker-php-ext-install pdo_mysql opcache && a2enmod rewrite
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
EXPOSE 80
