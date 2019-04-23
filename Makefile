.PHONY: install cs test

install:
	composer validate
	composer install

cs:
	vendor/bin/php-cs-fixer fix --diff --verbose

test:
	vendor/bin/simple-phpunit --coverage-text --coverage-html=build/coverage
