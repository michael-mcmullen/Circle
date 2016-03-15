<?php 

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

$routes = new Routing\RouteCollection();

/*
Example:
	$routes->add('example', new Routing\Route('/example', array(
	    '_controller' => 'Http\\Controllers\\LeapYearController::indexAction',
	)));
 */
$routes->add('home', new Routing\Route('/', [
    '_controller' => 'Http\\Controllers\\HomeController::index',
]));

return $routes;