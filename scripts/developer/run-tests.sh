#!/bin/bash

echo "Excuting test suite."
echo "Started at `date +"%T %d/%m/%Y"`"

./bin/phpunit

echo "Finished at `date +"%T %d/%m/%Y"`"
echo "EOF."
