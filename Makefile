
up:
	@docker-compose up -d

down:
	@docker-compose down --remove-orphan

destroy:
	@docker-compose down --remove-orphan --volumes
#
#grunt:
#	@docker-compose run --rm node npm install grunt-cli -g && npm install && npm rebuild node-sass && grunt default
#
#setup:
#	@make up
#	@docker-compose exec app sh -c 'test -s .env.local || cp .env .env.local'
#	@docker-compose exec app sh -c 'test -s phpunit.xml || cp phpunit.xml.dist phpunit.xml'
#	@docker-compose exec app composer install --ignore-platform-reqs --no-scripts
#	@docker-compose exec app sh -c 'echo "Waiting for database connection..."'
#	@docker-compose exec app /var/www/html/docker/wait-for mysql:3306 -t 600 -- echo "Database connection established"
#	@docker-compose exec app php bin/console doctrine:migrations:migrate --no-interaction
#	@docker-compose exec app php bin/console doctrine:fixtures:load --no-interaction
#	@docker-compose exec app php bin/console assets:install --symlink
#	@docker-compose exec app ln -s /var/www/html/assets/admin /var/www/html/public/bundles/admin
#	@docker-compose exec app ln -s /var/www/html/assets/client /var/www/html/public/bundles/client
#	@docker-compose exec app touch .Halite.key
#	@make grunt
#
#phpcs:
#	@docker run --rm --volume ${CURDIR}:/project gitlab.pxlwidgets.com:8443/internal/docker/phpcs:latest . \
#	--standard=PXLWidgets --report=full
