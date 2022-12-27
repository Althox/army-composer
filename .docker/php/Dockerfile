FROM php:8.2-fpm

##FIXME: Are all these packages required??
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        git \
        zip \
        unzip \
        libpq-dev \
        postgresql-dev \
    # Install extensions
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install php-pdo \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install php-pqsql\
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    ## Configure
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    ## Enable extensions
    && docker-php-ext-enable mysqli \
    && docker-php-ext-enable pgsql \
    && docker-php-ext-enable php-pqsql \
    && docker-php-ext-enable php-pdo \
    && docker-php-ext-enable pdo_mysql \
    && docker-php-ext-enable postgresql-dev

#Copy ini file for PHP
# COPY php.ini /usr/local/etc/php/conf.d/php.ini

#Add Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
# RUN symfony serve