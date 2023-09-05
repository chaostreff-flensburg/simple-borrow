FROM serversideup/php:8.2-fpm-nginx

ENV AUTORUN_LARAVEL_MIGRATION=true
ENV AUTORUN_ENABLED=false
ENV TZ=Europe/Berlin
ENV PHP_DATE_TIMEZONE=Europe/Berlin
ENV SSL_MODE=off

WORKDIR /var/www/html

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_18.x  | bash -
RUN apt-get -y install nodejs
RUN npm ci
RUN npm run build
RUN rm -rf node_modules

USER $PUID:$PGID

RUN mkdir -p /var/www/html/databasestore

COPY --chown=$PUID:$PGID ./ /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-dev

RUN npm ci
RUN npm run build

RUN php ./artisan event:cache && \
    php ./artisan route:cache && \
    php ./artisan view:cache

USER root:root
