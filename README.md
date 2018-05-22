# AndroidBaseDatos_versionPHP

Version RESTfull creada en PHP con el MicroFramework SLIM 3

Notas y caracteristicas:

- Los paquetes estan instalados con el composer, en el directorio vendor
	<b> composer require slim/slim </b><br>
    <b> composer require illuminate/database </b><br>
    <b> composer require tuupola/slim-jwt-auth </b><br>

- Establece una ruta de lectura y esta protegida con JWT.

- Usa Illuminate/Database con Eloquent ORM

- Requiere de PHP 5.6 como minimo

- En el directorio raiz de proyecto esta la base de datos en dump sql.

- Los parametros para la conexion con la base de datos estan dentro de bootstrap/app.php


Es usada por el ejemplo ManejoPersona

Referencias:<br>
https://www.slimframework.com/docs/v3/start/installation.html<br>
https://jwt.io/<br>
https://github.com/tuupola/slim-jwt-auth<br>
https://laravel.com/docs/5.0/eloquent<br>
