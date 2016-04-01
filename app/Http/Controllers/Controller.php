<?php

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/resources/views/'.$view.'.php';

        return new Response();
    }
}
