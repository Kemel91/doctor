FROM unit:1.31.0-php8.2
COPY ./*.pem  /docker-entrypoint.d/
COPY ./*.json /docker-entrypoint.d/
COPY ./*.sh   /docker-entrypoint.d/

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

# APCU
RUN pecl install apcu
RUN docker-php-ext-enable apcu

# INTL
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

# PDO PostgreSQL
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

# Zip
RUN docker-php-ext-install zip
RUN docker-php-ext-enable zip

# Opcache
RUN docker-php-ext-install opcache

# Sockets
RUN docker-php-ext-install sockets

# ------------------------------------------------------------------------------
# Cleanup Dependencies
# ------------------------------------------------------------------------------

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && ln -sf /usr/share/zoneinfo/Etc/UTC /etc/localtime