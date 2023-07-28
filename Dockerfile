FROM php:8.2-cli-alpine3.17

RUN mkdir -p /var/www/html
RUN mkdir -p /var/www/html/databasestore

WORKDIR /var/www/html

RUN apk add --no-cache \
    bash \
    gnupg \
    libzip-dev \
    nodejs~=18 \
    npm~=9 \
    unzip \
    zip \
    libpng-dev \
    icu-dev \
    icu-libs \
    tzdata

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

ENV TZ=Europe/Berlin

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-dev
RUN npm ci
RUN npm run build
RUN rm -rf node_modules

RUN chmod +x /var/www/html/docker/entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["bash", "/var/www/html/docker/entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
