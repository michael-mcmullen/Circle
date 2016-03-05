<?php

use app\base\Controller;

class home extends Controller
{
    public function index()
    {
        return $this->view('home/index', [
            'title' => 'Circle Framework',
        ]);
    }
}
