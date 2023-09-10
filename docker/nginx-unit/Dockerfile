FROM unit:1.31.0-php8.2
COPY ./*.pem  /docker-entrypoint.d/
COPY ./*.json /docker-entrypoint.d/
COPY ./*.sh   /docker-entrypoint.d/

ARG SITE_PATH=/var/www/html

USER root

RUN mkdir -p ${SITE_PATH} && \
chown -R unit:unit ${SITE_PATH} && \
chmod -R 775 ${SITE_PATH}

WORKDIR ${SITE_PATH}