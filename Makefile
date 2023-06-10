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
	docker exec $(CONTAINER_NAME) php artisan migrate

seed:
	docker exec $(CONTAINER_NAME) php artisan db:seed

clear:
	docker exec $(CONTAINER_NAME) php artisan optimize:clear

composer-install:
	docker exec $(CONTAINER_NAME) composer install --no-interaction --no-scripts
	docker exec $(CONTAINER_NAME) php artisan key:generate

build:
	docker-compose build
