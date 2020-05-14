.PHONY: sass serve

sass:
	npm run dev

serve: sass
	php artisan serve
