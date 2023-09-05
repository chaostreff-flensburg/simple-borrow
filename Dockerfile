FROM serversideup/php:8.2-fpm-nginx

ENV AUTORUN_LARAVEL_MIGRATION=true
ENV TZ=Europe/Berlin
ENV PHP_DATE_TIMEZONE=Europe/Berlin
ENV SSL_MODE=off

RUN mkdir -p /var/www/html/databasestore

WORKDIR /var/www/html

COPY ./ /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-dev

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_18.x  | bash -
RUN apt-get -y install nodejs
RUN npm ci
RUN npm run build
RUN rm -rf node_modules
