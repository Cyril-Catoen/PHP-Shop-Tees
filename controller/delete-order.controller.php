<?php 

require_once('../config.php');
require_once('../model/order-repository.php');

session_start();

$orderJustDeleted = false;
$message = "";

// Récupère la commande du client depuis la session si elle existe
$orderForUser = findOrderByUser() ?? null;

// Si formulaire soumis : suppression de commande
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($orderForUser) {
        $orderJustDeleted = deleteOrder();
        header("Location: " . $_SERVER['PHP_SELF']); // Redirection propre (Post/Redirect/Get)
        exit();
    }
}

// Si on vient juste de supprimer la commande (après redirection)
if (isset($_SESSION['order_deleted'])) {
    $orderJustDeleted = true;
    unset($_SESSION['order_deleted']);
    $message = "Votre historique de commande a été supprimé.";
}

// On recharge à nouveau après éventuelle suppression
$orderForUser = findOrderByUser() ?? null;

require_once('../view/delete-order-view.php');