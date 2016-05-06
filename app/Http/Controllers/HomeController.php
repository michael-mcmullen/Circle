<?php

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    
    public function __construct(
        //$baseUrl = '',
        $method = 'GET',
        //$host = 'localhost',
        //$scheme = 'http',
        //$httpPort = 80,
        //$httpsPort = 443,
        //$path = '/',
        //$queryString = ''
    )
    
    public function index()
    {
        return $this->view('home');
        //return new Response('Circle Framework');
    }
}
