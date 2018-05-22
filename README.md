# AndroidBaseDatos_versionPHP

Version RESTfull creada en PHP con el MicroFramework SLIM 3

Notas y caracteristicas:

- Los paquetes estan instalados con el composer, en el directorio vendor
	# composer require slim/slim
    # composer require illuminate/database
    # composer require tuupola/slim-jwt-auth

- Establece una ruta de lectura y esta protegida con JWT.

- Usa Illuminate/Database con Eloquent ORM

- Requiere de PHP 5.6 como minimo

- En el directorio raiz de proyecto esta la base de datos en dump sql.

- Los parametros para la conexion con la base de datos estan dentro de bootstrap/app.php


Es usada por el ejemplo ManejoPersona

Referencias:
https://www.slimframework.com/docs/v3/start/installation.html
https://jwt.io/
https://github.com/tuupola/slim-jwt-auth
https://laravel.com/docs/5.0/eloquent
