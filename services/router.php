<?php
// Si la variable page est définie dans l'url
// On utilise page pour trouver le controlleur 
if ( isset($_GET['page']) && file_exists("./controllers/controller_".$_GET['page'].".php") ){
    $page = $_GET['page'];
// Sinon la page c'est home et le controlleur c'est 
// controller_home.php (logique)
} else {
    $page = 'home';
}