<?php
// autoLoader everything
namespace App\Controllers;

Use Framework\Database;

class HomeController 
{
    protected $db;    

    public function __construct()
    {
        $config = require '../config/db.php';
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
        $users = $this->db->query('SELECT * FROM users LIMIT 6')->fetchAll();
        // inspect($users);
        loadView('home', [
            'listings' => $listings,
            'users' => $users,
        ]);
    }
}