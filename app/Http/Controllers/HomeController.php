<?php

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->method = 'GET';
    }
    
    public function index()
    {
        return $this->view('home');
        //return new Response('Circle Framework');
    }
}
