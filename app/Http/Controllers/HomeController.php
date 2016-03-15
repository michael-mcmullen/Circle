<?php 

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
    	return new Response("Circle Framework");
    }
}