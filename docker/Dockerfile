FROM php:8.3-apache-bookworm as app-local

# Install dependencies

RUN apt-get update && apt-get install -y \
    zlib1g-dev zip\
    libjpeg-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev\
    libpng-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y  jpegoptim optipng pngquant gifsicle libzip-dev libonig-dev

RUN docker-php-ext-install bcmath && docker-php-ext-enable bcmath


RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo pdo_mysql zip
#Enable pcntl
RUN docker-php-ext-configure pcntl --enable-pcntl && docker-php-ext-install pcntl;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

WORKDIR /var/www/html

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite


