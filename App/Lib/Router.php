<?php

class Router
{
    protected $currentModule = 'Performance';
    protected $currentController = 'Performance';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
           //call getUrl() and set returned URL parameters array as $url.
           $url = $this->getUrl();

        if (!empty($url)) {
            //Look in controllers for first value
            if (file_exists('../App/Module/'. $this->currentModule . '/Controller/' . ucwords($url[0]) . '.php')) {
                //If exists, set as controller
                $this->currentController = ucwords($url[0]);
                //Unset 0 index
                unset($url[0]);
                // var_dump($url);
            }
        }
        //Require the controller
        require '../App/Module/'. $this->currentModule . '/Controller/' . $this->currentController . '.php';
        
        //Instantiate controller class
        $this->currentController = new $this->currentController;

        //check for second part of url
        if (isset($url[1])) {
            //check to see if method exists in Controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                //unset 1 index
                unset($url[1]);
               //  var_dump($url);
            }
        }
       
        //Get params
        $this->params = $url?array_values($url):[];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(): array|bool
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return false;
    }
}

