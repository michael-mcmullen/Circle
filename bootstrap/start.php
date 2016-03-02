<?php

require_once '../app/base/App.php';
require_once '../app/base/Controller.php';

//Require dotenv notation
// Environment based configuration
// Allows developers using the getenv('<name>') method to fetch configuration values
if (file_exists('../.env')) {
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
}
