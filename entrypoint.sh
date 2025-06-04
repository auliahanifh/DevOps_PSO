#!/bin/bash
set -e

echo "Waiting for database connection..."
until mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
  sleep 2
done

echo "Running migrations..."
php artisan migrate

echo "Seeding database..."
php artisan db:seed

echo "Starting NGINX..."
exec "$@"

echo "Starting PHP-FPM..."
php-fpm