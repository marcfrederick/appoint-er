.PHONY: refresh-db mix serve test

refresh-db:
	php artisan migrate:fresh --seed

mix:
	npm run dev

serve:
	php artisan serve

test:
	vendor/bin/phpunit
