#!/bin/bash

echo "Start settings"
composer install
echo "Create new database"
php artisan migrate:fresh

read -p "Input dummy data ? (y/n): " STR2
case "$STR2" in
    [yY])
    php artisan db:seed;;
    [nN])
    echo "skip dummy data.";;
    *) echo "Push y or n key."
esac

echo "create symbolic link (public/storage->storage/app/public)"
php artisan storage:link

echo "npm install"
npm ls -g npm-check-updates &> /dev/null
if [ $? -ne 0 ] ; then
    npm install -g npm-check-updates
fi
read -p "update ? (y/n): " STR1
case "$STR1" in
    [yY])
    ncu
    ncu -u;;
    [nN])
    echo "skip update.";;
    *) echo "Push y or n key."
esac
npm install

read -p "Input 1 or 2 (1:npm run dev. 2:npm run watch-poll.) " STR3
case "$STR3" in
    [1])
    npm run dev;;
    [2])
    npm run watch-poll;;
    *) echo "Push 1 or 2 key."
esac
