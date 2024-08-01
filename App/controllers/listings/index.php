<?php

// instead of echo 'Listings'; to the page, load a view
use Framework\Database;


$config = require '../config/db.php';
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
$users = $db->query('SELECT * FROM users LIMIT 6')->fetchAll();

// access to views/listings/index.php
loadView('listings/index', [
    'listings' => $listings,
    'users' => $users,
]);