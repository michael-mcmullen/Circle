<?php

require 'autoloader.php';

// Require dotenv notation
// Environment based configuration
// Allows developers using the getenv('<name>') method to fetch configuration values
if (file_exists('../.env')) {
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
}

//Error Handling
if (getenv('APP_DEBUG') == "true") {
	$whoops = new \Whoops\Run();
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
	$whoops->register(); 
}

