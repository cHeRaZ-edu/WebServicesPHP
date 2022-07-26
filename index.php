<?php
require_once __DIR__ . '/Http/Server.php';
$server = new Server($routes);
$server->Listen();