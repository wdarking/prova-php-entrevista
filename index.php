<?php

require 'bootstrap.php';

$routes = [
    '/' => 'controllers/list.controller.php',
];

$route = $_GET['route'] ?? '/';

require $routes[$route];
