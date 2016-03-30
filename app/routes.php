<?php


use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('home', new Routing\Route('/', [
    '_controller' => 'Http\\Controllers\\HomeController::index',
]));

return $routes;
