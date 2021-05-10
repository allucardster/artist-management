help: ## show this help
	@echo 'usage: make [target] ...'
	@echo ''
	@echo 'targets:'
	@egrep '^(.+)\:\ .*##\ (.+)' ${MAKEFILE_LIST} | sed 's/:.*##/#/' | column -t -c 2 -s '#'
up: ## up all containers
	docker-compose up -d --remove-orphans
down: ## stop all containers
	docker-compose down
composer-install: ## make composer-install
	docker-compose exec php sh -c 'composer install'
database-init: ## init database
	docker-compose exec php sh -c './bin/console doctrine:database:drop --if-exists --force'
	docker-compose exec php sh -c './bin/console doctrine:database:create'
	docker-compose exec php sh -c './bin/console doctrine:migrations:migrate --no-interaction'
database-migrations: ## execute database migrations
	docker-compose exec php sh -c './bin/console doctrine:migrations:migrate --no-interaction'
jwt-generate-keypair: ## Generate ssl keys for jwt
	docker-compose exec php sh -c './bin/console lexik:jwt:generate-keypair --overwrite --no-interaction'