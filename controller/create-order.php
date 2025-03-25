<?php require_once('../config.php');

$message = "";

if (array_key_exists("quantity", $_POST) && 
    array_key_exists("teeshirt", $_POST)) {

    $quantity = $_POST['quantity'] ;
    $teeshirt = $_POST['teeshirt'] ;

    $message = "Vous avez commandé " . $quantity . " t-shirt(s) modèle " . $teeshirt . ".";
}

require_once('../view/create-order-view.php');

?>