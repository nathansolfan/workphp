<?php

// get the database - inspect($id)
$config = require '../config/db.php';
$db = new Database($config);

$id = $_GET['id'] ?? '';

loadView('listings/show');