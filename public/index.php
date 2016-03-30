<?php


require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$routes = include '../app/routes.php';
$sc = include '../bootstrap/container.php';

$request = Request::createFromGlobals();

$response = $sc->get('framework')->handle($request);

$response->send();
