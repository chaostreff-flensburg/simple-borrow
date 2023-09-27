FROM dunglas/frankenphp:latest-php8.2-alpine

RUN mkdir -p /app/databasestore

WORKDIR /app

RUN apk add --no-cache \
    bash \
    gnupg \
    libzip-dev \
    nodejs~=18 \
    npm~=9 \
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

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-jpeg
RUN docker-php-ext-install pdo_mysql bcmath intl exif gd

ENV TZ=Europe/Berlin

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /app

RUN composer install --optimize-autoloader --no-interaction --no-dev
RUN npm ci
RUN npm run build
RUN rm -rf node_modules

RUN chmod +x /app/docker/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["bash", "/var/www/html/docker/entrypoint.sh"]
