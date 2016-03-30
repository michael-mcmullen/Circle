<?php

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        die('a'); 
        return new Response('Circle Framework');
    }
}
