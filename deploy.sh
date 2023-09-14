#!/bin/bash

set -ex

function deploy {
  docker-compose up -d --build
  cp backend/.env.example backend/.env
  docker exec -it doctor-nginx-unit composer install
  docker exec -it doctor-nginx-unit php artisan key:generate
  docker exec -it doctor-nginx-unit php artisan migrate --seed
  docker exec -it doctor-nginx-unit composer install --no-dev --optimize-autoloader
}