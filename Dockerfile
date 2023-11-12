FROM php:8.2-cli-alpine3.18 AS build

RUN mkdir -p /var/www/html
RUN mkdir -p /var/www/html/databasestore

WORKDIR /var/www/html

# Install Composer manually
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN apk add --no-cache \
    npm

COPY ./ /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-dev --ignore-platform-req=ext-intl
RUN npm ci
RUN npm run build
RUN rm -rf node_modules

FROM unit:php8.2

RUN mkdir -p /var/www/html
RUN mkdir -p /var/www/html/databasestore

WORKDIR /var/www/html

COPY --from=build --chown=unit:unit /var/www/html /var/www/html

ENV TZ=Europe/Berlin

# Update package lists and install required dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    sudo \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install and enable the intl and gd extensions
RUN docker-php-ext-install intl gd

COPY docker/config.json /docker-entrypoint.d/config.json

COPY docker/entrypoint.sh /docker-entrypoint.d/entrypoint.sh

RUN chmod +x /docker-entrypoint.d/entrypoint.sh

EXPOSE 80
