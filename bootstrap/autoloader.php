<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

session_name('circle');
session_start();

require '../vendor/autoload.php';

//Require dotenv notation
// Environment based configuration
// Allows developers using the getenv('<name>') method to fetch configuration values
if (file_exists('../.env')) {
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
}

// Monolog
// create a log channel
$log = new Logger('Circle');
$log->pushHandler(new StreamHandler('../storage/logs/circle.log', Logger::WARNING));

// Set the new slim container
$container = new \Slim\Container();

$configuration = [
    'settings' => [
        'displayErrorDetails' => getenv('DEBUG'),
    ],
];

$app = new \Slim\App($container, $configuration);

//Setup View handler
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../resources/views');
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};