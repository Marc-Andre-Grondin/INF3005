<?php 

//Les images appartiennent à leurs propriétaires respectifs

//error_reporting(E_ALL);
//ini_set('display_errors','on');

//À modifier avec les informations de la DB
$db = mysqli_connect("localhost", 'root', 'password', 'database');

require_once('header.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'profile'  :       require_once('profile.php');
                            break;
    case 'commande' :       require_once('commande.php');
                            break;
    case 'connection' :     require_once('connexion.php');
                            break;
    case 'facture' :        require_once('facture.php');
                            break;
    case 'deconnection' :   logout();
                            break;
    case ''         :
    default         :       require_once('acceuil.php');
                            break;
}

require_once('footer.php');

function logout(){
    header('Location: index.php');
}

mysqli_close($db);

?>