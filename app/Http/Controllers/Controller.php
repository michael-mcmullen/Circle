<?php

namespace Http\Controllers;

class Controller
{
  public function view($view, $data = [])
  {
    require_once '../app/resources/views/' . $view . '.php';
    
    return new view();
  }
}
