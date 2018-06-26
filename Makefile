COMPOSER=./composer.phar
PHP=php

install:
	$(COMPOSER) install

bench/help:
	./vendor/bin/phpbench run --help

report=default
bench/default:
	./vendor/bin/phpbench run benchs --report=$(report)

bench/aggregate:
	$(MAKE) bench/default report=aggregate

bench/memory:
	$(MAKE) bench/default report=memory

$(COMPOSER):
	$(PHP) -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
