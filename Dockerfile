FROM php:8.1-apache

RUN apt-get update && apt-get install -y git

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql exif

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

WORKDIR /var/www/SupEnrollment

COPY . .

RUN chown -R www-data:www-data /var/www/SupEnrollment

RUN apt-get update && apt-get install -y curl bash \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

EXPOSE 80
