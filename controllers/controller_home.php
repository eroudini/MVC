<?php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
include "./views/layout.phtml";
