FROM composer:2.0 AS composer

FROM php:8.0-fpm as base

RUN apt update && apt install -y --no-install-recommends \
    git \
    openssh-client \
    libpq-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libmagickwand-dev \
    ffmpeg && \
    rm -r /var/lib/apt/lists/*

# Gcron for scheduler
COPY contrib/gcron /usr/local/bin/

# PHP extensions
COPY contrib/php.ini $PHP_INI_DIR/conf.d/php.ini
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd && \
    docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-webp=/usr/include/ && \
    docker-php-ext-install  pdo_pgsql pdo_mysql mysqli opcache gd exif && \
    docker-php-ext-enable pdo_mysql mysqli opcache gd pdo_pgsql

WORKDIR /src

ENV PATH="$PATH:/src/vendor/bin"
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.* ./
RUN composer install --no-scripts --no-autoloader --no-interaction --no-dev

FROM base as prod
COPY . ./
RUN chgrp -R www-data storage bootstrap/cache && chmod -R ug+rwx storage bootstrap/cache \
    && composer dump-autoload --optimize

FROM base as dev
RUN pecl install imagick && docker-php-ext-enable imagick
RUN composer install --no-scripts --no-autoloader --no-interaction --dev

COPY . ./
RUN chgrp -R www-data storage bootstrap/cache && chmod -R ug+rwx storage bootstrap/cache \
    && composer dump-autoload --optimize
