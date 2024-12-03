<?php
namespace App\Models;
use PDO;
class ArticleModel{
    public function runQuery(){
        $dsn = "mysql:host=db;dbname=db;charset=utf8;";
$pdo = new PDO($dsn,"db","db");

$stmt = $pdo->query("select * from article");
return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}