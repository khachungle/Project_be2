@echo off
echo Running migrate
php artisan migrate
echo Seeder 1 completed

echo Running Seeder 1
php artisan db:seed --class=UserSeeder
echo Seeder 1 completed

echo Running Seeder 1
php artisan db:seed --class=AboutSeeder
echo Seeder 1 completed

echo Running Seeder 2
php artisan db:seed --class=CategorySeeder
echo Seeder 2 completed

echo Running Seeder 3
php artisan db:seed --class=ProductSeeder
echo Seeder 3 completed

pause
