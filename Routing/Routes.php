<?php
    require_once __DIR__ . '/../Http/Route.php';
    require_once __DIR__ . '/../Http/View.php';
    class Routes {
        private $routes = [];
        public function get($url,$controller = NULL) {
            array_push($this->routes,new Route("GET",$url,$controller));
        }
        public function post($url,$controller = NULL) {
            array_push($this->routes,new Route("POST",$url,$controller));
        }
        public function FindRoute($uri,$method) {
            foreach($this->routes as $route) {
                if($route->isRoute($uri,$method))
                    return $route;
            }
            //Not found route
            return new Route($method,$uri, function ($req,$res) {
                return new View("/404");
            });
        }
    }
?>