.PHONY: sass serve

sass:
	npm run watch&

serve: sass
	php artisan serve
