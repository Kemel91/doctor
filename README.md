<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


### Deploy
1. git pull
2. docker-compose up -d --build 
3. cp backend/.env.example backend/.env
4. docker exec -it doctor-nginx-unit /bin/bash
5. composer install --no-dev --optimize-autoloader
6. php artisan key:generate
7. php artisan migrate