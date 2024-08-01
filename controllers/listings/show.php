<?php

// get the database - inspect($id)
// id = ' . $id) change to placeholder :id, $params
$config = require '../config/db.php';
$db = new Database($config);

$id = $_GET['id'] ?? '';

$params = [
    'id' => $id 
];

// Query, its modified on Database.php to take $params.
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();
inspect($listing);

loadView('listings/show');