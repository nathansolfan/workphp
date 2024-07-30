<?php 

return [
    '/' => 'controllers/home.php',
    '/listings' => 'controllers/listings/index.php',
    '/listings/create' => 'controllers/listings/create.php',
];

// from the $router = new Router() at public/index.php
$router->get();