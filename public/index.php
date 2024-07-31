<?php
require '../helpers.php';


// the 2 require using the basePath() func from the helpers
require '../Database.php';
$config = require '../config/db.php';

$db = new Database($config);

// require the function from helpers and pass the @param
// loadView('home'); goes to home.php

// router logic
// current URI with $_SERVER super global, ex: string(1) "/"
// inspectAndDie($uri);


require basePath('router.php'); 


$router = new Router();

// $routes = require basePath('routes.php');
$routes = require '../routes.php';


// this is where it starts with SERVER request
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// method from Router.php router(){}
$router->route($uri, $method);