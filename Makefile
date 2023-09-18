up:
	docker-compose up

build:
	docker-compose build

down:
	docker-compose down

restart:
	docker-compose restart

stop:
	docker-compose stop

ps:
	docker-compose ps

goto:
	docker exec -it $(CON) sh

migrate:
	docker exec $(CON) php artisan migrate
