<?php

namespace app\base;

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
    public function view($view, $viewData = [])
    {
        extract($viewData, EXTR_SKIP);

        require_once '../views/'.$view.'.php';
    }
}
