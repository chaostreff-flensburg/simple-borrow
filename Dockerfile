FROM php:8.3-cli-alpine3.19

RUN mkdir -p /var/www/html
RUN mkdir -p /var/www/html/databasestore

WORKDIR /var/www/html

RUN apk add --no-cache \
    bash \
    gnupg \
    libzip-dev \
    unzip \
    zip \
    icu-dev \
    icu-libs \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    libpng-dev \
    libjpeg-turbo-dev \
    tzdata

# Install Composer manually
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Install Node and NPM manually
COPY --from=node:20-alpine /usr/local/bin /usr/local/bin
COPY --from=node:20-alpine /usr/local/lib/node_modules /usr/local/lib/node_modules

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-jpeg
RUN docker-php-ext-install pdo_mysql bcmath intl exif gd

ENV TZ=Europe/Berlin

COPY ./ /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-dev
RUN npm ci
RUN npm run build
RUN rm -rf node_modules

RUN chmod +x /var/www/html/docker/*.sh

EXPOSE 9000
