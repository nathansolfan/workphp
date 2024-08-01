<?php

$config = require '../config/db.php';
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
$users = $db->query('SELECT * FROM users LIMIT 6')->fetchAll();

// inspect($users);

loadView('home', [
    'listings' => $listings,
    'users' => $users,
]);