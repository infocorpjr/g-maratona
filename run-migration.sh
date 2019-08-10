sudo chown $user:$user ./ -R
php artisan migrate:fresh --seed
sudo chown $user:$user ./storage -R