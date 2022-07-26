<?php 
    class View {
        private $uri;
        public function __construct($uri) {
            $this->uri = $uri;
        }
        public function render() {
            require __DIR__ . '/../views'. $this->uri . '.php';
        }
    }
?>