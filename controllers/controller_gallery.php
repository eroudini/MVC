<?php
$info = "Ceci est la galerie..."; 

// --- on charge la vue
// $sql->execute();
// $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);



$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
include "./views/layout.phtml";

// print_r($results)

?>



