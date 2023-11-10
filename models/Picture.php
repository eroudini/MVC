<?php 
require ("./services/databases.php");

class Picture{
    public static function getAll(){
    $picture = [];
    $pdo = connectDB();
    $sql = $pdo->prepare("SELECT * FROM picture ORDER BY id DESC");
    $sql->execute();
    $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $pictures;
    }
}