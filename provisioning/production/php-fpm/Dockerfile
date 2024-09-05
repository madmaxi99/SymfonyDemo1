FROM php:8.2-fpm

RUN apt-get update && apt-get install \
    zlib1g libzip-dev -y \
    && apt-get install -y --no-install-recommends ssh \
    && docker-php-ext-install pdo_mysql zip

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-install pcntl

RUN echo "xdebug.coverage_enable" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG USER_ID=0
ENV USER_ID ${USER_ID}
RUN echo USER_ID=${USER_ID}
RUN mkdir /var/www/.composer && chown $USER_ID:$USER_ID /var/www/.composer

RUN usermod -u $USER_ID www-data
USER $USER_ID
