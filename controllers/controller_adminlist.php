<?php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture ORDER BY id");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);


 ?>

<?php 
        // DELETE SECTION
    if (isset($_POST['Delete'])) {
            $sql = $db->prepare("DELETE FROM pictures (id, source, title, description, author, created_at, update_at)");
            $sql->execute([
            $_POST= ['id'],
            $_POST['source'],
            $_POST['title'],
            $_POST['description'],
            $_POST['author'],
            $_POST['created_at'],
            $_POST['update_at']
            ]);

            try {
                $sql = "DELETE FROM pictures WHERE id = ?";
                $sql = $connection->prepare($sql);
                $sql->execute([$id]);
            } catch (Exception $e) {
                $sqlError = $e->getMessage();
            }
    
            if (isset($sqlError)) {
                echo $sqlError;
            }

        }

        ?>



        <!-- UPDATE SECTION -->
    <?php
    // Delete name, firstName, mail
    // if exist POST
    if (isset($_POST['Delete'])) {
        print_r($_POST);
        echo '<p class"msgsupp">Article supprimer</p>';
        $id = $_POST['id'];
        $source = $_POST['source'];
        $title = $_POST['title'];
        $description = $_GET['description'];
        $author = $_GET['author'];
        $created_at = $_GET['created_at'];
        $update_at = $_GET['update_at'];

        // DELETE User
        try {
            $sql = "DELETE FROM pictures WHERE id = ?";
            $sql = $connection->prepare($sql);
            $sql->execute([$id]);
        } catch (Exception $e) {
            $sqlError = $e->getMessage();
        }

        if (isset($sqlError)) {
            echo $sqlError;
        }
    }
    // FIN DELETE SECTION


include "./views/layout.phtml";

    ?>
    





