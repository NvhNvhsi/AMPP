FROM php:7.4-apache

# PHP extensions

RUN apt-get update && docker-php-ext-install pdo_mysql
