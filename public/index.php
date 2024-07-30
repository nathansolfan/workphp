<?php
require '../helpers.php';

// require the function from helpers and pass the @param
// loadView('home');


// create array
$routes = [
    '/' => 'controllers/home.php',
    '/listing' => 'controllers/listings/index.php',
    '/listing/create' => 'controllers/listing/create.php',
    '404' => 'controllers/error/404.php',
];

// router logic
// current URI with $_SERVER super global

$uri = $_SERVER['REQUEST_URI'];
inspectAndDie($uri);

