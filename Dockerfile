# Use Composer official image to install dependencies
FROM composer:latest AS composer
WORKDIR /app

# Install Laravel (for a new project)
RUN composer create-project --prefer-dist laravel/laravel .

# Use the PHP 8.2 with Apache image
FROM php:8.2-apache

# Install required packages and PHP extensions
RUN apt-get update && apt-get install -y \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libgif-dev \
        libfreetype6-dev \
        libzip-dev \
        unzip \
        && docker-php-ext-configure gd --with-jpeg --with-freetype \
        && docker-php-ext-install gd pgsql pdo pdo_pgsql zip \
        && pecl install xdebug \
        && docker-php-ext-enable xdebug

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set the working directory to the Apache document root
WORKDIR /var/www/html

# Copy the Laravel project from the Composer build stage
COPY --from=composer /app /var/www/html

#----------------------------------------------------------
# Copy custom Apache virtual host configuration
COPY ./config/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Enable mod_rewrite for Laravel
RUN a2enmod rewrite

# Restart Apache to apply the changes
RUN service apache2 restart
#----------------------------------------------------------

# Ensure required directories exist and set permissions
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose the port Apache will run on
EXPOSE 80
