FROM php:8.0-fpm

RUN apt update && apt install -y procps

# Add a user and group 'www-data' with specific UID/GID

RUN mkdir -p /var/www/html && \
    mkdir -p /var/log/php-fpm/ && \
    chown -R www-data:www-data /var/log/php-fpm/ && \
    chown -R www-data:www-data /var/www/html

RUN mkdir -p /usr/local/var/run/ && chown -R 33:33 /usr/local/var/run && chown -R www-data:www-data /var/www/html

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Switch to the 'www-data' user

WORKDIR /var/www/html

USER www-data

# Start php-fpm as the 'www-data' user
CMD ["php-fpm"]

