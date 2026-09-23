FROM php:8.4-apache
RUN docker-php-ext-install pdo_mysql opcache && a2enmod rewrite
EXPOSE 80
