FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip \
    default-mysql-client \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libssl-dev \
    && docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

CMD ["php-fpm"]
