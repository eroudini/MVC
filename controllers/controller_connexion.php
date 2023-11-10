<?php
// session_start();

$error = "";

if (isset($_POST['envoi'])){
    $mail = strip_tags($_POST['mail']);
    $db = connectDB();
    $sql = $db->prepare("SELECT * FROM users WHERE mail=?");
    $sql->execute([$mail]);
    $users = $sql->fetch(PDO::FETCH_ASSOC);
    if ($sql->rowCount() == 0){
        $error = "Vous n'avez pas de compte <a href=\"?page=inscription\">enregistrer</a> svp.";
    }
    $passVerif = password_verify(strip_tags($_POST['mdp']),$users['mdp']);
    if (!$passVerif){
        $error = "Désolé Login/Mot-de-passe incorrect(s).";
    }
    if (empty($error)){
        $_SESSION['user'] = $user;
        header("Location:?page=adminlist");
    }
}

// --- la vue
include "./views/layout.phtml";










// --- on charge la vue

// <!-- CONNECT DB Adapaté a la page de connexion -->

    //     try {
    //         $host = 'localhost';
    //         $db_name = 'dwwm_2023_10_20';
    //         $login = 'root';
    //         $pass = '';

    //         $connection = new PDO("mysql:host=$host;dbname=$db_name", $login, $pass);
    //         $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     } catch (Exception $e) {
    //         die($erreur_sql = 'Erreur connect bd: ' . $e->getMessage());
    //     }
       

    // if(isset($_POST['envoi'])){
    //     if(!empty($_POST['mail'])){
    //         $mail = htmlspecialchars($_POST['mail']);
    //         $mdp = htmlspecialchars($_POST['mdp']);
    //         // ICI JE FAIT UN SELECT DU MAIL MAIS PAS AVEC LE MDP CAR IL EST HACHER.
    //         $stmt = $connection->prepare('SELECT * FROM users WHERE mail=?');
    //         $stmt->execute(array($mail));
    //         // ICI JE DECLARE USERDB qui me renvoi un tableau associatif des valeurs associés nottamment le mail et mdp
    //         $userdb = $stmt->fetch(PDO::FETCH_ASSOC);

    //                 // var_dump me permet d'avoir le resultat de la variable $userdb
    //         // var_dump($userdb);


    //         // CONDITION DE VERIFICATION SI LES DONNES EXISTES
    //         if($stmt->rowCount() > 0){
    //             // verification du mdp
    //             $passwordHash = ($userdb['mdp']);
    //             if (password_verify($mdp, $passwordHash)){
    //                 $info = $stmt->fetch();
    //                 $_SESSION['id'] = $info['id'];
    //                 $_SESSION['firstName'] = $info['firstName'];
    //                 $_SESSION['name'] = $info['name'];
    //                 $_SESSION['mail'] = $info['mail'];
    //                 // $_SESSION['mdp'] = $info['mdp'];
    //                 header("Location:?page=home" . htmlspecialchars($_SESSION['id']));
    //             }
                       
    //         }else{
    //             echo "mot de passe ou mail incorect";
    //         }

    //     }else{
    //         // echo "Veuillez compléter tous les champs...";
    //     }
    // }


    // include "./views/layout.phtml";
    // ?>




