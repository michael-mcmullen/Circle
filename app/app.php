<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('home', new Routing\Route('/', array(
    '_controller' => 'Circle\\Http\\HomeController::index',
)));

return $routes;