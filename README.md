Este proyecto se realizó con Laravel, vue y Vuetify

Para poder correrlo es necesario seguir lo siguientes pasos: 

git clone git@github.com:HectorRojasB/Library.git
composer install
cambiar el nombre del archivo .env.example por .env
php artisan key:generate
crear una base de datos vacía y poner las credenciales en el archivo  .env
php artisan migrate
php artisan db:seed
cambiar el nombre del archivo index.php por server.php
php artisan serve
