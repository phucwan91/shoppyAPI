app-install:
	docker exec -it php7.1 sh -c "cd /usr/local/apache2/htdocs/shoppy && \
	composer install && \
	bin/console doctrine:database:create --if-not-exists && \
	bin/console doctrine:schema:update --force && \
	rm -rf var/* && \
	exit" \

make app-data-reset:
	docker exec -it php7.1  sh -c "cd /usr/local/apache2/htdocs/shoppy && bin/console hautelook:fixtures:load --no-interaction"

make app-cs-fix:
	docker exec -it php7.1  sh -c "cd /usr/local/apache2/htdocs/shoppy && php -n bin/php-cs-fixer fix --allow-risky yes --verbose"
