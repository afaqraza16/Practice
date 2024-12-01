<?php
namespace App\Models;
use PDO;
class NewsModel{
    public function runQuery(){
        $dsn = "mysql:host=db;dbname=db;charset=utf8;";
$pdo = new PDO($dsn,"db","db");

$stmt = $pdo->query("select * from news");
return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}