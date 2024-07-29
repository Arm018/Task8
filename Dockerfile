# Use the latest Ubuntu image
FROM ubuntu:latest

# Update package list and install prerequisites
RUN apt-get update && \
    apt-get install -y \
    software-properties-common \
    curl \
    mysql-server

# Add Ondřej Surý's PHP repository
RUN add-apt-repository ppa:ondrej/php && \
    apt-get update

# Install PHP 8.2 and other packages
RUN apt-get install -y \
    php8.2-cli \
    php8.2-common \
    php8.2-mysql \
    php8.2-zip \
    php8.2-gd \
    php8.2-mbstring \
    php8.2-curl \
    php8.2-xml \
    php8.2-bcmath

# Download Composer installer
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php

# Install Composer
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy application files into the container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install application dependencies
RUN composer install

# Clean up Composer installer
RUN rm /tmp/composer-setup.php

# Expose ports
EXPOSE 80
EXPOSE 3306

# Default command
CMD ["bash"]
