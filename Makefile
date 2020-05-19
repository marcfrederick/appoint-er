.PHONY: refresh-db sass serve test

refresh-db:
	php artisan migrate:fresh --seed

sass:
	npm run dev

serve:
	php artisan serve

test:
	vendor/bin/phpunit
