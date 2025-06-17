FROM auliahanifh/devops-pso:base-php8.2

RUN apt-get update && apt-get install -y php8.2-redis php8.2-apcu

# Setup
RUN rm -rf /var/www/html/*
WORKDIR /var/www/html
COPY . .

# Change Permission
RUN chown -R www-data:www-data .

# Install packages
RUN sudo -u www-data composer install --no-progress --prefer-dist --optimize-autoloader

# Generate Key
RUN php artisan key:generate

# Change Permission Logs
RUN chmod -R 777 storage/logs

# Configure NGINX
COPY docker/nginx/default /etc/nginx/sites-enabled/default

# Migrate & Seed Database
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD nginx -g 'daemon off;'