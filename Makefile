run:
	docker-compose up --build -d && docker-compose run --rm composer i && sleep 3 && docker-compose run --rm php vendor/bin/phinx migrate
stop:
	docker-compose stop
migrate:
	docker-compose run --rm php vendor/bin/phinx migrate