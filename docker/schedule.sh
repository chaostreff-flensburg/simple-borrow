#!/bin/bash

echo "Starting the schedule"
cd /var/www/html && php artisan schedule:run
