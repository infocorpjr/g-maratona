sudo chown $user:$user ./ -R
php artisan migrate:fresh --seed
sudo chown www-data:www-data ./storage -R