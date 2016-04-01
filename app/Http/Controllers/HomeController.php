<?php

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        return $this->view('home');
        //return new Response('Circle Framework');
    }
}
