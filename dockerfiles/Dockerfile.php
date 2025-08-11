FROM php:8.1-fpm

RUN apt-get update && apt-get install -y git zip unzip \
	&& docker-php-ext-install pdo pdo-mysql

WORKDIR /var/www/html
