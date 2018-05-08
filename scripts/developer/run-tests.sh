#!/bin/bash

echo "Excuting test suite."
echo "Started at `date +"%T %d/%m/%Y"`"

./bin/console ca:cl --env=test
./bin/console doctrine:database:drop --force --env=test
./bin/console doctrine:database:create --env=test
./bin/console doctrine:schema:update --force --env=test
./bin/console hautelook:fixtures:load --no-interaction --env=test
./bin/phpunit

echo "Finished at `date +"%T %d/%m/%Y"`"
echo "EOF."
