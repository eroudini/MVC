<?php
if (isset($_POST['submit'])) {
    $db = connectDB();
    $sql = $db->prepare("INSERT INTO picture (source, title, description, author) VALUES(?,?,?,?)");
    $sql->execute([
        $_POST['source'],
        $_POST['title'],
        $_POST['description'],
        $_POST['author']
        ]);
    header("Location:?page=adminlist");
}

include "./views/layout.phtml";
