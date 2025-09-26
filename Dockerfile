FROM php:8.3-fpm-alpine

# Installazione delle dipendenze di sistema e delle estensioni PHP
RUN apk update && apk add --no-cache \
    git \
    curl \
    libxml2-dev \
    oniguruma-dev \
    sqlite-dev \
    libzip-dev \
    mysql-client \
    mysql-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif

# Scarica Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la directory di lavoro nel container
WORKDIR /var/www/html

# Copia i file del progetto (il .dockerignore esclude le cose non necessarie)
COPY --chown=www-data:www-data . /var/www/html

# Espone la porta 9000 (per PHP-FPM)
EXPOSE 9000

# Avvia PHP-FPM
CMD ["php-fpm"]