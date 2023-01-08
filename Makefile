CONTAINER_NAME=mr_moda_fitness

install:
	make build
	make up
	cp .env.example .env
	make composer-install
	make migrate
	make seed

up:
	docker-compose up -d

down:
	docker-compose down

migrate:
	php artisan migrate

seed:
	php artisan db:seed

clear:
	php artisan cache:clear

composer-install:
	docker exec $(CONTAINER_NAME) composer install --no-interaction --no-scripts
	docker exec $(CONTAINER_NAME) php artisan key:generate

build:
	docker-compose build
