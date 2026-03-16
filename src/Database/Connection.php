<?php

namespace Mhakkou\LearningTracker\Database;

use PDO;
use PDOException;

class Connection {
    
    private static $instance = null;
    private $conn;

    public function __construct()
    {
        $db_host = $_ENV['DB_HOST'];
        $db_port = $_ENV['DB_PORT'];
        $db_user = $_ENV['DB_USER'];
        $db_password = $_ENV['DB_PASSWORD'];
        $db_name = $_ENV['DB_NAME'];

        $dsn = "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try{
            $this->conn = new PDO($dsn, $db_user, $db_password, $options);
        }catch(PDOException $e){
            error_log('Connexion error : ' . $e->getMessage());
            die('Failed to connect to the db' . $e->getMessage());
        }
        
    }

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

}