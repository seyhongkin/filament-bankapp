composer install



php artisan make:filament-user

php artisan db:seed --class=CardSeeder
php artisan db:seed --class=TransactionSeeder
php artisan db:seed --class=BalanceHistorySeeder

app('card_service')->transfer(402.12);