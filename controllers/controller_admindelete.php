<?php

if(isset($_GET['id'])){
    $id = intval( $_GET['id']);
    $db = connectDB();
    $sql = $db->prepare("DELETE FROM picture WHERE id=?");
    $sql->execute([$id]);

    header("Location:?page=adminlist");
}