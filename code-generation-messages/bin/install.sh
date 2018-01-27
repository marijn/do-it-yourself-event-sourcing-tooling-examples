#!/usr/bin/env sh

bin/install-composer.sh
php composer.phar install
wget -O phpunit.phar https://phar.phpunit.de/phpunit-6.phar
