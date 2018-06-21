<?php

    /**
     * głowna klasa aplikacji prasująca linki oraz wywolujaca klasy i ich metody
     * @source source https://www.youtube.com/watch?v=WRgHBu3msA4
     */
    class App {

        // default value
        protected $controller = 'home';
        protected $method = 'index';
        protected $params = array();        
        
        public function __construct() {
            // echo "App->construct:<br>";
        	$url = $this->parseUrl();
            
            // czy pierszy parametr jest kontrolerem
            if (file_exists('app/controllers/'.$url[0].'.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
            // echo "<br>controller is : " . $this->controller;
            
            // zaladuj klase kontrolera i utworz instancje
            require_once 'app/controllers/'.$this->controller.'.php';
            $this->controller = new $this->controller;
            
            if (isset($url[1])){
                // jezeli drugi parametr jest metodą klasy 
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
            
            // sprawdzanie parametrow
            $this->params = $url ? array_values($url) : [];
            
            // echo "<br>method is : " . $this->method;
            // echo "<br>params are :<pre>". print_r($this->params, true) . "</pre>";

            // wywolanie metody z przekazaniem parametrow - ?patrz param domyslne
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        /**
         * filtrowanie i trimowanie adresu URL
         */
        public function parseUrl() {
            if (isset($_GET['url'])) {
                return $url = explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
            }
        }
    }
?>