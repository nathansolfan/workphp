<?php
// require the function from helpers and pass the @param
// loadView('home'); goes to home.php

// router logic
// current URI with $_SERVER super global, ex: string(1) "/"
// inspectAndDie($uri);

require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;
// the 2 require using the basePath() func from the helpers
// require '../Framework/Database.php';
// require basePath('Framework/router.php');

// bottom does the same as this above
// which is not needed after composer

// spl_autoload_register(function ($class) {
//     $path = basePath('Framework/' . $class . '.php');
//     if (file_exists($path)) {
//         require $path;
//     }
// });

// Instantiating the router
$router = new Framework\Router();

// $routes = require basePath('routes.php'); - Get routes
$routes = require '../routes.php';

// this is where it starts with SERVER request - Get Current URI and HTTP
// for the http://localhost:8000/listings/2 - pass parse_url
// like this dont include the ID on the main URI, inspect($uri) shows that 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


// method from Router.php router(){} - Route the request
$router->route($uri);



// steps:
// $uri and $method and pass into the route()
// routes.php file maps to controller and loads it as GET request
// Home controller, there $config and $db to grab the database
// loadview( 'home' ,[
// add the variable created from DB])
// and in the views its acccessible 