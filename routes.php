<?php 

// return [
//     '/' => 'controllers/home.php',
//     '/listings' => 'controllers/listings/index.php',
//     '/listings/create' => 'controllers/listings/create.php',
// ];

// from the $router = new Router() at public/index.php
$router->get('/', 'HomeController@index');

// $router->get('/', 'controllers/home.php');
// $router->get('/listings', 'controllers/listings/index.php');
// $router->get('/listings/create', 'controllers/listings/create.php');

// $router->get('/listing', 'controllers/listings/show.php');

