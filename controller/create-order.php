<?php require_once('../config.php');

session_start();

$message = "";

if (array_key_exists("quantity", $_POST) && // vérifie que la quantité a été saisie ET
    array_key_exists("teeshirt", $_POST)) { // vérifie que le modèle de t-shirt a été sélectionné

    $order=[
    "quantity" => $_POST['quantity'] , // récupère la valeur de la quantité dans l'input quantity une fois le formulaire soumis
    "teeshirt" => $_POST['teeshirt'] // recupère la valeur du modèle de t-shirt dans le select teeshirt une fois le formulaire soumis
    ] ; 

    $_SESSION['order'] = $order;

     $message = "Vous avez commandé " . $order['quantity'] . " t-shirt(s) modèle " . $order['teeshirt'] . "."; //concatène un message composé de texte prédéfinis et des valeurs récupérés de quantité et du modèle de t-shirt

 
}

require_once('../view/create-order-view.php'); // récupère le contenu de la view pour afficher le HTML fixe + la partie dynamique / personnalisé par le code PHP. Il faut l'appeler après avoir déclaré la variable $message et le if pour ne pas avoir de code d'erreurs.
// Si on le require avant $message, le code étant lu de haut en bas, la lecture du code s'interrompt parce que la view appelle la variable $message mais elle n'est pas encore définie.

?>