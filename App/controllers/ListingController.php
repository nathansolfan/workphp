<?php
// autoLoader everything
namespace App\Controllers;

Use Framework\Database;

class ListingController 
{
    protected $db;    

    public function __construct()
    {
        $config = require '../config/db.php';
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
        $users = $this->db->query('SELECT * FROM users LIMIT 6')->fetchAll();
        // inspect($users);
        loadView('home', [
            'listings' => $listings,
            'users' => $users,
        ]);
    }


    public function create()
    {
        loadView('listings/create');
    }

    public function show()
    {
        $id = $_GET['id'] ?? '';
        $params = [
            'id' => $id 
        ];
        // Query, its modified on Database.php to take $params.
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();
        // inspect($listing);

        // loadView has been changed to accept array []
        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
}