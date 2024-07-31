<?php

class Database {
    public $conn;

    /**
     * Constructor for Database class
     * 
     * @param array $config
     * 
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            // remember $this->conn as its a property
            // create new PDO class with the 3 params
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
        
    }


}