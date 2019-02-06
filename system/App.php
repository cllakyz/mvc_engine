<?php
class App
{
    protected $controller;
    protected $method;
    protected $params = array();

    public function __construct()
    {
        $this->controller = "home";
        $this->method = "index";
        $url = $this->parseUrl();

        if(file_exists("app/controllers/".$url[0].".php")){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : array();
        call_user_func_array(array($this->controller, $this->method), $this->params);
    }

    public function parseUrl()
    {
        $x = array();
        if(isset($_GET['url'])){
            $x = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return $x;
    }
}