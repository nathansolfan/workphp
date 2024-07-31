<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        // DSN (Data Source Name) for the PDO connection
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        // Options for PDO
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Enable exceptions for errors
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
            echo "Connection successful!";
        } catch (PDOException $e) {
            error_log("Database connection failed: DSN={$dsn}, User={$config['username']} - Error: {$e->getMessage()}");
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }
}
