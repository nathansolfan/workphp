<?php

$config = require '../config/db.php';
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
$employee = $db->query('SELECT * FROM employee LIMIT 6')->fetchAll();

inspect($employee);

loadView('home');