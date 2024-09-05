FROM php:8.2-fpm

RUN apt-get update && apt-get install cron -y && apt-get install nano zlib1g libzip-dev -y && docker-php-ext-install pdo_mysql zip && apt-get clean && \
    apt-get autoclean && \
    apt-get autoremove && \
    rm -rf /var/cache/apt/* && \
    rm -rf /var/lib/apt/lists/*

# Create a shared group
RUN groupadd -g 1007 albion

COPY startcron.sh /
RUN chmod +x /startcron.sh
CMD /startcron.sh
