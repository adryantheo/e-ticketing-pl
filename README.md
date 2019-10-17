# e-ticketing-pl
E-Ticketing Project for PL SHS

# Guide:
1. Clone Repo Via GitKraken
2. Buka Folder Clone Repo di Harddisk
3. Buka Terminal/ CMD
4. Ketik "composer install" tunggu sampai selesai
5. Ketik "npm install" tunggu sampai selesai
6. Start XAMPP, create db dengan nama "tiketku"
7. Rename file .env.example menjadi .env
8. Ganti konfigurasi env, DB_DATABASE=tiketku
9. Ketik "php artisan key:generate"
10. Ketik "php artisan migrate:refresh --seed"
11. Ketik "php artisan passport:install" 
12. Ketik "npm run watch/dev" 
13. Ketik "php artisan serve"
 
