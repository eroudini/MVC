<?php
// session_start();

$connexion = new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
if(isset($_GET['id']) AND $_GET['id'] >0 ){
    $takeid = intval($_GET['id']);
    $req = $connexion->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($takeid));

    $takeinfo = $req->fetch();
}
?>

<!-- CONFIG DU PROFILE  -->


