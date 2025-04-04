<?php 

require_once('../config.php');
require_once('../model/order-repository.php');
require_once('../model/product-repository.php');

session_start(); // démarre la session, permet de créer un identifiant unique sauvegardé dans les cookies du navigateur de l'utilisateur

$message =null;

// if (array_key_exists("quantity", $_POST) && // vérifie que la quantité a été saisie ET
//     array_key_exists("teeshirt", $_POST)) { // vérifie que le modèle de t-shirt a été sélectionné

//     $order=[
//     "quantity" => $_POST['quantity'] , // récupère la valeur de la quantité dans l'input quantity une fois le formulaire soumis
//     "teeshirt" => $_POST['teeshirt'] // recupère la valeur du modèle de t-shirt dans le select teeshirt une fois le formulaire soumis
//     ] ; 

//     $_SESSION['order'] = $order; // permet de récupérer le tableau $order avec la super globale $_SESSION. L'information reste disponible tant que les cookies ne sont pas supprimées ou qu'une nouvelle commande n'est pas réalisée. En l'état n'affiche que la dernière commande réalisée/en attente.

//     $message = "Vous avez commandé " . $order['quantity'] . " t-shirt(s) modèle " . $order['teeshirt'] . "."; //concatène un message composé de texte prédéfinis et des valeurs récupérés de quantité et du modèle de t-shirt

 
// }

// if (array_key_exists('quantity', $_POST) && array_key_exists('teeshirt', $_POST)) {
//         $order = createOrder();

//         if ($order == false) { // Si $order retourne False alors on sauvegarde la commande dans la session, on définit une chaîne de caractères pour la variable vide $messageError et on retourne cette variable dans $orderByUser pour l'affichage sur la view.
//             $messageError = "quantité incorrecte";
//             $orderByUser = $messageError;
//         }

//         else { // $order existe et est conforme à ce qui est attendu, on sauvegarde la commande et utilise la fonction findOrderByUser pour récupérer le tableau contenu dans $order.
//             saveOrder($order);
//             $orderByUser = findOrderByUser();
//         }
// }

if (array_key_exists('quantity', $_POST) && array_key_exists('teeshirt', $_POST)) {
    try {
        $order = createOrder($_POST['quantity'], $_POST['teeshirt']);
        saveOrder($order);
        $message = [
            "type" => "success",
            "message" => "Commande passée avec succès."
        ];
    } 
    
    catch (Exception $error) {
        $message = [
            "type" => "error",
            "message" => $error->getMessage()]; // Récupère le message de l'exception, getMessage est une fonction intégrée de PHP.
    }
}

$orderByUser = findOrderByUser();


require_once('../view/create-order-view.php'); // récupère le contenu de la view pour afficher le HTML fixe + la partie dynamique / personnalisé par le code PHP. Il faut l'appeler après avoir déclaré la variable $message et le if pour ne pas avoir de code d'erreurs.
// Si on le require avant $message, le code étant lu de haut en bas, la lecture du code s'interrompt parce que la view appelle la variable $message mais elle n'est pas encore définie.

?>