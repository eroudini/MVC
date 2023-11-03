
<?php
$db = connectDB();   
$id = intval( $_GET['id']);
$sql = $db->prepare("SELECT * FROM picture WHERE id=?");
$sql->execute([$id]);
$picture = $sql->fetch(PDO::FETCH_ASSOC);


    // Update name, firstName, mail
    // if exist POST

    if (isset($_POST['Update'])) {
        // print_r($_POST);
        $title = $_POST['title'];
        $description = $_POST['description'];
        $source = $_POST['source'];
        $author = $_POST['author'];

        // Update User
        try {
            $sql = "UPDATE picture SET title=?, description=?, source=?, author=? WHERE id=?";
            $sql = $db->prepare($sql);
            $sql->execute(array($title, $description, $source, $author, $id));
        } catch (Exception $e) {
            $sqlError = $e->getMessage();
        }

        if (isset($sqlError)) {
            echo $sqlError;
        }  

        header('Location:?page=adminlist');

    }
    ?>
    <?php include "./views/layout.phtml"; ?>

