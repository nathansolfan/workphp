<?php
// require the function from helpers and pass the @param
// loadView('home'); goes to home.php

// router logic
// current URI with $_SERVER super global, ex: string(1) "/"
// inspectAndDie($uri);


require '../helpers.php';
// the 2 require using the basePath() func from the helpers
require '../Database.php';
require basePath('router.php'); 

// Instantiating the router
$router = new Router();
// $routes = require basePath('routes.php'); - Get routes
$routes = require '../routes.php';

// this is where it starts with SERVER request - Get Current URI and HTTP
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// method from Router.php router(){} - Route the request
$router->route($uri, $method);



