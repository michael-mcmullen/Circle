<?php

namespace Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class Controller
{
    /**
     * Allows use of views in the controller functions
     * @var    $view 
     * @param  array $data
     */
    public function view($view, $data = [])
    {
        require_once '../app/resources/views/'.$view.'.php';

        return new Response();
    }
}
