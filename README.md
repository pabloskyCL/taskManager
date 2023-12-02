Instrucciones para ejecutar prueba:

antes de comenzar se usa el ambiente local para levantar la aplicación es necesario tener instalado node, docker y docker compose para levantar el proyecto, otro requisito es tener libre el puerto 80 al momento de levantar la aplicación, es importante tener en cuenta que sin lo antes dicho, no se puede levantar la aplicación. Una vez clonado el proyecto:



1. situados en la carpeta del proyecto instalar las dependencias con:
   1. composer install
   2. npm install
2. compilar el front-end con:
   1. npm run build 
3.  levantar los contenedores con: 
   1. ./vendor/bin/sail up -d
   2. revisar estado de los contenedores con docker ps
   3. correr migraciones con ./vendor/bin/sail php artisan migrate
4. acceder a en el navegador a localhost



para correr los test : ./vendor/bin/sail php artisan test