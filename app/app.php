<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('home', new Routing\Route('/', [
    '_controller' => 'Http\\HomeController::index',
]));

return $routes;
