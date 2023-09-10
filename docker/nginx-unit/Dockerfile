FROM unit:1.31.0-php8.2

ARG SITE_PATH=/var/www/html

USER root

RUN mkdir -p ${SITE_PATH} && \
chown -R www-data:www-data ${SITE_PATH} && \
chmod -R 775 ${SITE_PATH}

WORKDIR ${SITE_PATH}

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# ------------------------------------------------------------------------------
# Install Dependencies
# ------------------------------------------------------------------------------

RUN apt-get update \
    && pecl channel-update pecl.php.net \
    && apt-get -y --no-install-recommends install \
      libzip-dev \
      libicu-dev \
      libpq-dev \
      unzip \
      git \
      curl

# ------------------------------------------------------------------------------
# Install PHP
# ------------------------------------------------------------------------------

# Composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer \

# PDO PostgreSQL
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

# Zip
RUN docker-php-ext-install zip
RUN docker-php-ext-enable zip

# Opcache
RUN docker-php-ext-install opcache

# ------------------------------------------------------------------------------
# Cleanup Dependencies
# ------------------------------------------------------------------------------

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && ln -sf /usr/share/zoneinfo/Etc/UTC /etc/localtime