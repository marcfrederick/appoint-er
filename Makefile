.PHONY: refresh-db sass serve

refresh-db:
	php artisan migrate:fresh --seed

sass:
	npm run dev

serve: sass
	php artisan serve
