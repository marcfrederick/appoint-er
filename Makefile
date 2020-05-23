COMPOSER := ./composer.phar
NPM := npm

.PHONY: setup
setup:
	$(COMPOSER) install
	$(NPM) install

.PHONY: config
config: deps
	cp -n .env.example .env
	php artisan key:generate
	@echo 'Remember to modify the generated .env file'

.PHONY: resources
resources:
	$(NPM) run dev

.PHONY: dump-autoload
dump-autoload:
	$(COMPOSER) dump-autoload -o

.PHONY: refresh-db
db-fresh:
	php artisan migrate:fresh --seed

.PHONY: run
run:
	php artisan serve

.PHONY: run-fresh
clean-run: setup resources dump-autoload db-fresh run

.PHONY: check
check:
	vendor/bin/phpunit
