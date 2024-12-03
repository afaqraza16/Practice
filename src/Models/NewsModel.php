<?php
namespace App\Models;

use App\Database;
use PDO;
class NewsModel{
    public function __construct(private  Database $db)
    {
    }

    public function runQuery(){
        $pdo = $this->db->getConnection();
        // dump($pdo);
        $stmt = $pdo->query("select * from news");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}