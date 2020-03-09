#!/bin/bash

echo "Starting entrypoint.sh ..."
echo "Installing dependencies"
composer install

echo "Generating app key"
php artisan key:generate

echo "Running migrations..."
php artisan migrate

echo "Install Laravel Collective lib"
composer require laravelcollective/html

echo "Starting PHP FPM"
php-fpm