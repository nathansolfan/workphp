<?php

// need to import $routes and set it to the $routes variable
$routes = require basePath('routes.php');

// check if URI is in the array, with array_key_exists and the 2 params: key/array
if(array_key_exists($uri, $routes)){
    require(basePath($routes[$uri]));
} else {
    // change status code from 200 to 404
    http_response_code(404);
    require(basePath($routes['404']));
}