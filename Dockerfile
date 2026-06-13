#FROM php:7.4-cli
FROM php:8.0-cli

RUN apt-get update && apt-get install -y postgresql-client \
    git unzip \
    libpq-dev \
    libxml2-dev \
    libonig-dev \
    && docker-php-ext-install \
    pdo pdo_pgsql mbstring tokenizer xml ctype

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
