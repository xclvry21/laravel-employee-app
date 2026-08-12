# Makefile for laravel-employee-app
# Usage: make <target>   e.g. make up

.PHONY: help build up down restart logs ps bash key migrate fresh seed \
        install breeze route-list test permissions

help: ## Show this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | \
	awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}'

build: ## Build (or rebuild) the containers
	docker-compose up -d --build

up: ## Start the containers in the background
	docker-compose up -d

down: ## Stop and remove the containers
	docker-compose down

restart: ## Restart the containers
	docker-compose restart

logs: ## Tail logs for the app container
	docker-compose logs -f app

ps: ## Show container status
	docker-compose ps

bash: ## Open a shell inside the app container
	docker-compose exec app bash

key: ## Generate the Laravel app key
	docker-compose exec app php artisan key:generate

migrate: ## Run database migrations
	docker-compose exec app php artisan migrate

fresh: ## Drop all tables and re-run migrations + seeders
	docker-compose exec app php artisan migrate:fresh --seed

seed: ## Run all seeders
	docker-compose exec app php artisan db:seed

seed-employees: ## Run only the EmployeeSeeder
	docker-compose exec app php artisan db:seed --class=EmployeeSeeder

install: ## Install Composer dependencies
	docker-compose exec app composer install

breeze: ## Install Laravel Breeze (auth scaffolding)
	docker-compose exec app composer require laravel/breeze --dev
	docker-compose exec app php artisan breeze:install blade
	docker-compose exec app npm install
	docker-compose exec app npm run build

route-list: ## List all registered routes
	docker-compose exec app php artisan route:list

test: ## Run the test suite
	docker-compose exec app php artisan test

permissions: ## Fix file ownership on the host after Docker writes as root
	sudo chown -R $$USER:$$USER .