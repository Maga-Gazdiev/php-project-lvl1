install:
	     composer install
brain-games:
	     ./bin/brain-games
brain-even:
	     ./bin/brain-even
brain-calc:
	     ./bin/brain-calc
brain-gcd:
	     ./bin/brain-gcd
brain-progression:
	     ./bin/brain-progression
brain-prime:
	     ./bin/brain-prime		 
validate:
	     composer validate 
lint:
		composer exec --verbose phpcs -- --standard=PSR12 src bin
fix:
		 phpcbf -p -s -v -n . --extensions=php
phpstan:
		vendor/bin/phpstan analyse -l 9 src