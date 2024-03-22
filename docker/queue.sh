#!/bin/bash

echo "Starting the queue"
cd /var/www/html && php artisan queue:work --queue=default --tries=3
