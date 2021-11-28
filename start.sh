#!/bin/bash

#Project initialization
composer install --no-interaction

composer dump-autoload --optimize --classmap-authoritative

php bin/console doctrine:migrations:migrate --no-interaction
php bin/console doctrine:fixtures:load
php
