FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    zip \
    unzip \
    libpq-dev

# RUN pecl install memcached-3.2.0

# Install & configure extensions
RUN docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pgsql pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Clean up apt cache
RUN rm -rf /var/lib/apt/lists/*