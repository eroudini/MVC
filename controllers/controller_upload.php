<?php

$error = "";

// Je recup les infos sur le fichier 

define('MAX_SIZE', 100000); // taille max
define('WIDTH_MAX', 800);  // Lrg max
define('HEIGHT_MAX', 800); // Hauteur max

// Tbl des donnes

$extAcpt = array('jpg', 'png', 'jpeg'); // extension accepter
$infosImg = array();

// Variables
$tabFileName = !empty($fileType) ? explode("/",$fileType) : [1=>""];
$fileExt = $tabFileName[1];
$extension = '';
$message = '';
$nomImage = '';

// Vérification de l'existence du champ
if (isset($_POST['upload']) && isset($_FILES['image_file'])) {

    // Récupération du nom du fichier
    $file_name = $_FILES['image_file']['name'];

    // Récupération de l'extension du fichier
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    // Vérification de l'extension du fichier
    if (!in_array(strtolower($extension), ['jpg', 'png', 'jpeg'])) {
        $error = "L'extension du fichier est incorrecte !";
    } else {

        // Vérification du type de l'image
        $infos_img = getimagesize($_FILES['image_file']['tmp_name']);
        if ($infos_img[2] < 1 || $infos_img[2] > 14) {
            $error = "Le fichier à uploader n'est pas une image !";
        } else {

            // Vérification des dimensions et de la taille du fichier
            if ($infos_img[0] > WIDTH_MAX && $infos_img[1] > HEIGHT_MAX && filesize($_FILES['image_file']['tmp_name']) > MAX_SIZE) {
                $error = "La taille ou les dimensions de l'image sont trop grandes !";
            } else {

                // Récupération du nom du fichier renommé
                $new_file_name = md5(uniqid()) . '.' . $extension;

                // Déplacement du fichier vers le dossier de destination
                if (!move_uploaded_file($_FILES['image_file']['tmp_name'], './uploads/' . $new_file_name)) {
                    $error = "Une erreur interne a empêché l'upload de l'image !";
                } else {
                    // Affichage d'un message de confirmation
                    $message = "L'image a été uploadée avec succès !";
                }
            }
        }
    }
} else {
    $error = "Le champ est vide !";
}

// Inclusion de la vue
include './views/layout.phtml';

?>