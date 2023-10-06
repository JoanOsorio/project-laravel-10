Pasos para instalacion del sistema

clonar el repositorio: git clone https://github.com/JoanOsorio/project-laravel-10.git
instalar dependencias de composer: composer install
copiar el .env, cambiar datos de conexion si es necesario
crear la bd, se realizo con Postrgresql.
ejecutar el script sql que esta en database/ubications.sql
realizar las migraciones: php artisan migrate
realizar el seeder de Administrador: php artisan db:seed

se utilizo laravel 10.2.5
PHP 8.2.4
Composer version 2.5.8
