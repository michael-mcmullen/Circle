<?php

class App
{
    //Sets the default route when visiting root url.
    //Ex. example.com/ uses /home/index
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        /*
            This uses the controller in the url.
         */
        if (file_exists('../app/http/controllers/'.$url[0].'.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/http/controllers/'.$this->controller.'.php';

        $this->controller = new $this->controller();
        /*
            This uses the method passed in the url.
         */
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        /*
            This uses the parameters sent after the controller and method.
         */
        $this->params = $url ? array_values($url) : [];
        /*
            Calls the method and params sent to the controller.
         */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
