FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    zlib1g libzip-dev \
    ssh \
    nano \
    git \
    && docker-php-ext-install pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Configure Xdebug
RUN echo "xdebug.mode=debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install additional PHP extension
RUN docker-php-ext-install pcntl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Set Symfony CLI home directory to a writable path
ENV SYMFONY_CLI_HOME=/app/.symfony

# Create Symfony CLI directory and set permissions
RUN mkdir -p /app/.symfony && chown www-data:www-data /app/.symfony

# Ensure the .symfony5 directory exists and is writable
RUN mkdir -p /var/www/.symfony5 && chown www-data:www-data /var/www/.symfony5

# Set up correct permissions for Composer directory
RUN mkdir -p /var/www/.composer && chown www-data:www-data /var/www/.composer

# Switch to the appropriate user
USER www-data
