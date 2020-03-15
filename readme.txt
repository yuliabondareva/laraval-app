git clone https://github.com/yuliabondareva/laravel-app.git

docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan config:cache

docker-compose exec db bash
mysql -u root -p

пароль yulia

GRANT ALL ON apidb.* TO 'root'@'%';
FLUSH PRIVILEGES;
