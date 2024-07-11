# Use the official PHP Apache image
FROM php:7.4-apache

# Install system dependencies
RUN apt-get update \
    && apt-get install -y \
       git \
       unzip \
       libicu-dev \
       libzip-dev \
       inotify-tools

# Install Composer globally
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Set working directory
WORKDIR /var/www/html

# Copy application source code
COPY src/ /var/www/html/

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 80 and start Apache
EXPOSE 80
CMD ["apache2-foreground"]
