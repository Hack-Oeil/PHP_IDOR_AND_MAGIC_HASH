FROM php:8.0-apache

WORKDIR /var/www/html

RUN apt update && apt install -y zip unzip
# Installer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer le module Apache mod_rewrite
RUN a2enmod rewrite

# COPY docker-virtualhost.ini /usr/local/etc/php/conf.d/docker-virtualhost.ini
COPY www/ .

RUN service apache2 restart

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update

EXPOSE 80