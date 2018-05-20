<?php 

session_start();
date_default_timezone_set ( 'America/Guayaquil' );

require __DIR__ . '/../vendor/autoload.php';


$app = new \Slim\App([

	'settings' => [

		'determineRouteBeforeAppMiddleware' => true,
		'displayErrorDetails' => true,
	    'addContentLengthHeader' => false,
	    'db' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'database' => 'base_datos',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		],

	],
]);


$container = $app->getContainer();
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container["jwt"] = function ($container)
{
	return new StdClass;
};


$container['db'] = function ( $container ) use ( $capsule ) {
	return $capsule;
};

$container['DataController'] = function ($container) {
	return new \App\Controllers\DataController($container);
};

$app->add(new \Slim\Middleware\JwtAuthentication([
		"attribute" => "jwt",
		"secure"=>true,
        "relaxed" => ["localhost","192.168.1.11","jjsc.ddns.net"],
		"secret" =>  'e6K0v3I5s4B2l9G8',
		"algorithm" => ["HS512"],
		"callback" => function ($request, $response, $arguments) use ($container) {
			$container["jwt"] = $arguments["decoded"];
		},
		"error" => function ($request, $response, $arguments) {
			$data["status"] = "error";
			$data["message"] = $arguments["message"];

			return $response->withHeader("Content-Type", "application/json")->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
		},
]));

require __DIR__ . '/../app/routes.php';

?>