#!/bin/bash

mkdir -p storage/framework/{sessions,views,cache}
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan migrate --force

exec "$@"
