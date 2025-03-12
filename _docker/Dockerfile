FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    curl \
    git \
    libicu-dev \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    intl

RUN a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY ./_docker/php.ini /usr/local/etc/php/conf.d/custom.ini

COPY . /var/www

RUN composer install --no-dev --optimize-autoloader

ENV APACHE_DOCUMENT_ROOT /var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www/writable /var/www/public \
    && chmod -R 755 /var/www/writable /var/www/public \
    && mkdir -p /var/www/writable/uploads /var/www/writable/xml /var/www/writable/cache \
    && chown -R www-data:www-data /var/www/writable/uploads /var/www/writable/xml /var/www/writable/cache \
    && chmod -R 755 /var/www/writable/uploads /var/www/writable/xml /var/www/writable/cache

EXPOSE 80