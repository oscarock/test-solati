FROM php:8-alpine3.19

WORKDIR /var/www/html

# Instalar dependencias necesarias
RUN apk --update --no-cache add \
    libzip-dev \
    zip \
    postgresql-dev \
    && docker-php-ext-install zip pdo_pgsql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

EXPOSE 80

CMD [ "php", "-S", "0.0.0.0:80" ]