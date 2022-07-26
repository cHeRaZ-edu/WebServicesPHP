<?php
    class Route {
        private $method;
        private $uri;
        private $controller;
        
        public function __construct($method,$uri,$controller = NULL) {
            $this->method = $method;
            $this->uri = $uri;
            $this->controller = $controller;
        }
        public function isRoute($uri,$method) {
            return $this->uri == $uri && $this->method == $method;
        }
        public function pipeline() {
            $controller = $this->controller;
            $view = $controller(null,null);
            $view->render();
        }
    }
?>