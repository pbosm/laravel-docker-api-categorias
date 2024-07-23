# Use the official PHP image as a base image
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Set the working directory in the container
WORKDIR /var/www

# Set the user and group to match your host system
RUN usermod -u 1000 www-data

# Expose port 9000 for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
