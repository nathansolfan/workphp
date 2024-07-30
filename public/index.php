<?php
require '../helpers.php';

// require the function from helpers and pass the @param
// loadView('home'); goes to home.php


// create array
$routes = [
    '/' => 'controllers/home.php',
    '/listing' => 'controllers/listings/index.php',
    '/listing/create' => 'controllers/listing/create.php',
    '404' => 'controllers/error/404.php',
];

// router logic
// current URI with $_SERVER super global, ex: string(1) "/"

$uri = $_SERVER['REQUEST_URI'];

// inspectAndDie($uri);

// check if URI is in the array, with array_key_exists and the 2 params: key/array
if(array_key_exists($uri, $routes)){
    require(basePath($routes[$uri]));
} else {
    require(basePath($routes['404']));
}