<?php

$requestUri = strtok($_SERVER['REQUEST_URI'], '?'); 
$requestMethod = $_SERVER['REQUEST_METHOD'];
$basePath = '/reg2'; 

$path = str_replace($basePath, '', $requestUri);

$routes = [
    '/' => __DIR__ . '/login.php',
	'/about' => __DIR__ . '/views/about.php',
	'/active' => __DIR__ . '/active_users.php',
    '/contact' => __DIR__ . '/views/contact.php',
    '/404' => __DIR__ . '/views/404.php'
];

    if (isset($routes[$path])) {
        include_once($routes[$path]);
    }
     else {
        include_once($routes['/404']);
    }
