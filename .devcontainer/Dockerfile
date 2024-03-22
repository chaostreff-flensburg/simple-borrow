FROM mcr.microsoft.com/devcontainers/php:0-8.2

RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl \
&& apt-get install -y libzip-dev \
&& docker-php-ext-install zip
