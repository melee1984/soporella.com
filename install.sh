#!/bin/sh
#
# Install the Loyalty Rewards Manager for the first time.
#
echo "===========  Installation Starting =============";

echo "-----------  Install front-end dependencies ------";
# sudo npm install --global gulp-cli
# npm install

echo "-----------  Installing composer dependencies ------";
# composer install -q -n

echo "-----------  Migrating the database ------";
echo "-----------  Seeding the database ------";
echo "-----------  Setting default authorization ------";
echo "-----------  Populating Seeding ------";
php artisan migrate:fresh --seed

echo "-----------  Generating application key ------";
php artisan key:generate --force

echo "-----------  Build front end in production mode ------";
# gulp prod >/dev/null

echo "===========  Installation Complete =============";
