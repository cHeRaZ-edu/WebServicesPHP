<?php
    require_once __DIR__ . '/../Routing/Web.php';
    class Server {
        private $routes;
        public function __construct($routes = NULL) {
            $this->routes = $routes;
        }
        private function resolveUri() {
            $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
            if($uri) {
                $uriLength = strlen($uri) - 1;
                $uri = $uri[$uriLength] == '/' && $uriLength != 0 ? rtrim($uri,"/") : $uri;
            }
            else
                $uri = '/404';
            return $uri;
        }
        private function requestMethod() {
            return $_SERVER['REQUEST_METHOD'];
        }
        public function Listen() {
            if(!$this->routes)
                return;
            $uri = $this->resolveUri();
            $route = $this->routes->FindRoute($uri,$this->requestMethod());
            $route->pipeline();
        }
    }
?>