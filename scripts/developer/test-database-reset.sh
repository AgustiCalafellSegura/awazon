#!/bin/bash

echo "Reseting database test script."
echo "Started at `date +"%T %d/%m/%Y"`"

php bin/console cache:clear --env=test
php bin/console doctrine:database:drop --force --env=test
php bin/console doctrine:database:create --env=test
php bin/console doctrine:schema:update --force --env=test
php bin/console hautelook:fixtures:load -n --env=test

echo "Finished at `date +"%T %d/%m/%Y"`"
echo "EOF."
