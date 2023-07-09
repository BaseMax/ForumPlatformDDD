FROM php:8.1

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    default-mysql-client

RUN docker-php-ext-install pdo_mysql mbstring zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . /app

RUN composer update --no-interaction --no-scripts --prefer-dist

RUN cp .env.example .env

EXPOSE 2929

CMD ["php", "-S", "localhost:2929", "public/index.php"]

