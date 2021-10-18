#!/bin/bash

echo "Cache Clear"
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan view:clear
php artisan clear-compiled
php artisan optimize
rm -f bootstrap/cache/config.php

echo "create folders"
find config/ -type f | xargs grep storage_path | grep framework
mkdir -p storage/framework/cache/data/
mkdir -p storage/framework/aop/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views

composer dump-autoload

echo "Completed"
