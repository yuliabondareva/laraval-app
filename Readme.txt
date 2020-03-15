git clone https://github.com/yuliabondareva/laravel-app.git

docker-compose exec app composer install
docker-compose exec app php artisan migrate
