#!/bin/bash

cd /var/www/html && mkdir -p storage/framework/{sessions,views,cache}
cd /var/www/html && php artisan storage:link
cd /var/www/html && php artisan optimize:clear
cd /var/www/html && php artisan config:cache
cd /var/www/html && php artisan route:cache
cd /var/www/html && php artisan view:cache
cd /var/www/html && php artisan event:cache
cd /var/www/html && php artisan migrate --force

exec "$@"
