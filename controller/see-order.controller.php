<?php 

require_once('../config.php');
require_once('../model/order-repository.php');


session_start(); // démarre la session, permet de créer un identifiant unique sauvegardé dans les cookies du navigateur de l'utilisateur

$message = "";
$orderForUser = findOrderByUser(); // on récupère la commande du client 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si le serveur récupère des données POST (on appuie sur le bouton pay), on exécute le code suivant :
    
    if ($orderForUser['status'] == "CART") {
    $orderForUser['status'] = "CANCELLED"; // on change le statut de la commande de l'utiisateur de CART à PAID
    saveOrder($orderForUser); // on sauvegarde la commande après le changement de statut pour prendre en compte le fait que le client à payer
    } 
    
    else {
    $message = "Votre commande a été payée, vous ne pouvez pas l'annuler.";
    }
}


require_once('../view/see-order-view.php');
?>