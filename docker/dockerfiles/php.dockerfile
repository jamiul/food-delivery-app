FROM php:8.2-fpm

# author
LABEL maintainer="Jamiul Alam <jamiulewu24@gmail.com>"

# Define build arguments for UID and GID with default values
ARG UID=1000
ARG GID=1000

# Set environment variables for UID and GID
ENV UID=${UID}
ENV GID=${GID}

# Create a system group for Laravel
RUN addgroup --system laravel --gid ${GID}

# Create a system user for Laravel and add it to the group
RUN adduser --system laravel --no-create-home --ingroup laravel --uid ${UID} --shell /bin/bash

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

# environment variables setting
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

# command executed in image building
RUN set -eux && \
    # update package list
    apt update && \
    apt -y install wget zip unzip lsb-release apt-transport-https ca-certificates libsodium-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev && \
    wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list && \
    apt update && \
    # install required PHP modules and dependencies
    apt install -y libicu-dev && \
    pecl install xdebug-3.2.2 && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install intl pdo_mysql sodium gd zip && \
    docker-php-ext-enable xdebug && \
    # install Composer
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    # remove installation cache
    apt clean && \
    rm -rf /var/lib/apt/lists/*

USER laravel

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]