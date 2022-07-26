<?php
    require_once __DIR__ . '/Routes.php';
    require_once __DIR__ . '/../Http/View.php';
    $routes = new Routes();

    $routes->get('/', function ($req,$res) {
        return new View('/index');
    });
    $routes->get('/about', function ($req,$res) {
        return new View('/about');
    });
?>