Proyecto Movie Rental - César Lara

El proyecto se desarrollo bajo la arquitectura y herramientas:
PHP 7.3
MYSQL 5.6
composer 1.9
Slim framework 3.0
Apache Server 2.4.41
Heroku
Postman

Los archivos de configuracion a la base de datos estan en:

/class_sesiones/config.php - Para el funcionamiento del mantenimiento del sistema

/src/config/db.php - Para la ejecución de la clase usuarios (RESTApi)

el backup de la base de datos utilizada se llama: bd_movierental_bk.sql

La aplicación de la API rest se realizó un ejercicio de GET, POST, PUT, DELETE de usuarios dentro de la base de datos estos métodos son accionados desde la clase /src/rutas/usuarios.php