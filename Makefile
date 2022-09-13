run:
	docker-compose up --build -d && docker-compose run --rm composer i && cd src/frontend && npm run dev
stop:
	docker-compose stop
migrate:
	docker-compose run --rm php vendor/bin/phinx migrate