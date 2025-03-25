<?php require_once('../config.php');

$message = "";

if (array_key_exists("quantity", $_POST) && // vérifie que la quantité a été saisie ET
    array_key_exists("teeshirt", $_POST)) { // vérifie que le modèle de t-shirt a été sélectionné

    $quantity = $_POST['quantity'] ; // récupère la valeur de la quantité dans l'input quantity une fois le formulaire soumis
    $teeshirt = $_POST['teeshirt'] ; // recupère la valeur du modèle de t-shirt dans le select teeshirt une fois le formulaire soumis

    $message = "Vous avez commandé " . $quantity . " t-shirt(s) modèle " . $teeshirt . "."; //concatène un message composé de texte prédéfinis et des valeurs récupérés de quantité et du modèle de t-shirt
}

require_once('../view/create-order-view.php');
?>