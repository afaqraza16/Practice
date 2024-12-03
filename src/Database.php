<?php

namespace App;
use PDO;

class Database {
    public function __construct(public string  $host,public string $db,public string $user, public string $password)
    {
        dump("Database created");
    }
    public function getConnection(){
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8;";
        $pdo = new PDO($dsn,$this->user,$this->password);
        return $pdo;
        
    }
}