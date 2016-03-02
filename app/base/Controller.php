<?php

class Controller
{
    /*
        Load the model by name
     */
    public function model($model)
    {
        require_once '../app/http/models/'.$model.'.php';

        return new $model();
    }

    /*
        Load the view
     */
    public function view($view, $data = [])
    {
        require_once '../views/'.$view.'.php';
    }
}
