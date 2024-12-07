FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    bash \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_pgsql zip

# Copy application files
WORKDIR /var/www/app
COPY . .

# Install Composer
COPY --from=composer:2.0.9 /usr/bin/composer /usr/bin/composer

# Optional: Install Symfony CLI for convenience
RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

EXPOSE 9000