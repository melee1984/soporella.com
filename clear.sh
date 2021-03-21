#!/bin/sh
#
# Install the Loyalty Rewards Manager for the first time.
#
echo "===========  Starting Cache Clear =============";

php artisan cache:clear

echo "===========  Route Clear =============";

php artisan route:clear

echo "===========  Config Clear =============";

php artisan config:clear

echo "===========  View Clear =============";

php artisan view:clear

echo "===========  Caching View=============";

php artisan view:cache

echo "===========  Done clearning Soporella =============";