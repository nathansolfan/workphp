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

        // Options for PDO - PDO::FETCH_ASSOC
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
            // echo "Connection successful!";
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * 
     * @param string $query
     * add params to modify the query
     * @return PDOStatement
     * @throws PDOExcepetion 
     */ 
     public function query($query, $params = []) {
        try {
            // $conn from property and then new PDO instance up on try/catch
            $stmt = $this->conn->prepare($query);

            // Bind named params before execute with bindValue() method
            foreach ($params as $param => $value) {
                $stmt->bindValue(':' . $param, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getmessage()}");            
        }
     }

}
