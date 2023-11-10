<?php

// ESSAIE CONNEXION MAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPmailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['inscription'])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 25;
}

// FIN






try {
    $host = 'localhost';
    $db_name = 'dwwm_2023_10_20';
    $login = 'root';
    $pass = '';

    $connection = new PDO("mysql:host=$host;dbname=$db_name", $login, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die($erreur_sql = 'Erreur connect bd: ' . $e->getMessage());
}
?>

        <?php

        if (isset($_POST['inscription'])) {
            if (!empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['mail']) && !empty($_POST['mdp']));
            $name = htmlspecialchars($_POST['name']);
            $firstName = htmlspecialchars($_POST['firstName']);
            $mail = htmlspecialchars($_POST['mail']);
            // Hachage du mot de passe
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $insertUser = $connection->prepare('INSERT INTO users(name, firstName, mail, mdp)VALUES(?,?,?,?)');
            $insertUser->execute(array($name, $firstName, $mail, $mdp));
            header("Location:?page=adminlist");
        } else {
            echo "";
        }


        include "./views/layout.phtml";

        ?>