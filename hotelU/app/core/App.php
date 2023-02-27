<?php
    class App {
        protected $controller = 'HomeController';
        protected $method = 'index';
        protected $params = [];

        public function __construct()
        {
            // echo $_SERVER["REQUEST_URI"] . '<br>';
            $this->parseURL();
            if(file_exists(CONTROLLERS . $this->controller . '.php')) {
                $this->controller = new $this->controller;
                if(method_exists($this->controller, $this->method)) {
                    call_user_func_array([$this->controller, $this->method], $this->params);
                }
            }
        }
        public function parseURL() {
            $request = trim($_SERVER['REQUEST_URI'], '/');
            // echo $request . "<br>";
            if(!empty($request)) {
                $url = explode('/', $request);
                $this->controller = isset($url[2]) ? $url[2] . 'Controller' : 'HomeController';
                // echo $this->controller;
                $this->method = isset($url[3]) ? $url[3] : 'index';
                unset($url[0],$url[1],$url[2], $url[3]);
                $this->params = !empty($url) ? array_values($url) : [];
            }
        }
        
    }
?>