<?php
use Illuminate\Database\Capsule\Manager as Capsule;


session_start();

require '../vendor/autoload.php';
require 'database.php';

//Require dotenv notation
// Environment based configuration
// Allows developers using the getenv('<name>') method to fetch configuration values
if (file_exists('../.env')) {
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
}

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => getenv('DEBUG')
    ]
]);

$app->db = function(){
	return new Capsule;
};

$container = $app->getContainer();
//Setup View handler
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../app/views');
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

require 'routes.php';
