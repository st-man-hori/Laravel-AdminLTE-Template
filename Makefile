init:
		docker-compose up -d --build
		docker-compose exec -u docker php bash -c "chmod -R 777 storage"
		docker-compose exec -u docker php bash -c "composer install"
		docker-compose exec -u docker php bash -c "php artisan migrate --seed"
		docker-compose exec -u docker php bash -c "php artisan storage:link"

php:
		docker-compose exec -u docker php bash

db:
		docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD'