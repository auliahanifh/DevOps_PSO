#!/usr/bin/env bash
set -e

echo "Waiting for database connection..."
until mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
  sleep 2
done

echo "Running migrations..."
php artisan migrate:fresh --force

echo "Seeding database..."
php artisan db:seed --class=UserSeeder

echo "Import Keranjang Belanja"
mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" $DB_DATABASE < /var/www/html/trial_laravel.sql

echo "Starting PHP-FPM..."
service php8.2-fpm start

echo "Starting NGINX..."
exec "$@"