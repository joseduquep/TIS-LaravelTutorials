FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip libzip-dev libpng-dev libonig-dev git curl \
 && docker-php-ext-install zip pdo_mysql \
 && rm -rf /var/lib/apt/lists/*

# Instalar Composer dentro de la imagen
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
