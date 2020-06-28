Este proyecto se realizó con Laravel, vue y Vuetify

Para poder correrlo es necesario seguir lo siguientes pasos: 

git clone git@github.com:HectorRojasB/Library.git <br>
composer install <br>
cambiar el nombre del archivo .env.example por .env <br>
php artisan key:generate <br>
crear una base de datos vacía y poner las credenciales en el archivo .env <br>
php artisan migrate <br>
php artisan db:seed <br>
cambiar el nombre del archivo index.php por server.php <br>
php artisan serve <br>
