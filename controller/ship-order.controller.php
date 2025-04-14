<?php 

require_once('../config.php');
require_once('../model/order-repository.php');

session_start(); // démarre la session, permet de créer un identifiant unique sauvegardé dans les cookies du navigateur de l'utilisateur

$message = "";
$orderForUser = findOrderByUser(); // on récupère la commande du client 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si le serveur récupère des données POST (on appuie sur le bouton expédier), on exécute le code suivant :
    
    if ($orderForUser['status'] == "PAID") {
    $orderForUser['status'] = "SENT"; // on change le statut de la commande de l'utiisateur de PAID à SENT
    saveOrder($orderForUser); // on sauvegarde la commande après le changement de statut pour prendre en compte le fait que le client à payer
    $message = "Votre commande a été expédiée.";
} 
    else if ($orderForUser['status'] == "SENT") {
    $message = "Votre commande a déjà été expédiée.";
} 

    else if ($orderForUser['status'] == "CANCELLED") {
    $message = "Votre commande a été annulée. Vous ne pouvez pas l'expédier, veuillez créer une nouvelle commande.";
    } 

    else if ($orderForUser['status'] == "CART") {
        $message = "Vous n'avez pas payé votre commande.";
        } 
    
    else {
    $message = "Vous n'avez pas payé votre commande.";
    }
}


require_once('../view/ship-order.view.php');
?>