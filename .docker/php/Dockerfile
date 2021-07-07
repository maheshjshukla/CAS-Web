From php:8.0.0-apache

MAINTAINER Mahesh Shukla

RUN mkdir /var/www/cas_admin
COPY --chown=www-data:www-data . /var/www/cas_admin
COPY .docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Install PHP extensions
RUN docker-php-ext-install bcmath pdo_mysql

# Install gd extension
RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev git libzip-dev zip && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd && \
    docker-php-ext-install zip

# Install zip and unzip extension
# RUN apt-get install zip unzip

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_15.x | bash
RUN apt-get install --yes nodejs
RUN node -v
RUN npm -v

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/cas_admin

# ENABLE MOD_REWRITE
RUN a2enmod rewrite

# Set permissions
#RUN chown -R www-data:www-data /var/www/cas_admin
RUN chmod -R ug+rwx storage bootstrap/cache
# chmod -R 777 storage

# Install Vendor
RUN composer install

# Expose ports (required by AWS)
EXPOSE 80
EXPOSE 443