<?php
require_once __DIR__ . '/vendor/autoload.php';

$dsn = "mysql:host=db;dbname=db;charset=utf8;";
$pdo = new PDO($dsn,"db","db");

$stmt = $pdo->query("select * from news");
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    foreach($news as $new){
        dump($new['title']);
    }
    ?>