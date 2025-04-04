<?php 

// function createOrder() {
//         if ($_POST['quantity'] > 0 && $_POST['quantity'] <= 3) {
//             $order=[
//                 "quantity" => $_POST['quantity'] , // récupère la valeur de la quantité dans l'input quantity une fois le formulaire soumis
//                 "teeshirt" => $_POST['teeshirt'], // recupère la valeur du modèle de t-shirt dans le select teeshirt une fois le formulaire soumis
//                 "created_at" => (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s') // Ajoute la date et l'heure actuelles
//             ] ; 

//             return $order;
//         }

//         else {
//             return false;
//         }
//     }

function createOrder($quantity, $teeshirt) {
    if (!isset($quantity, $teeshirt)) {
    throw new Exception("Les champs 'quantity' et 'teeshirt' sont requis.");
    }

    if ($quantity <= 0 || $quantity > 3) {
    throw new Exception("Erreur de quantité : vous devez commander entre 1 et 3 t-shirts.");
    }

    $date = new DateTime('now', new DateTimeZone('Europe/Paris')); // Fuseau horaire Paris

    $order = [
        "quantity" => $quantity,
        "teeshirt" => $teeshirt,
        "created_at" => $date->format('Y-m-d H:i:s'),
        "status" => "CART"
    ]; 

    return $order;
}

function saveOrder($order) {
    if ($order){
        $_SESSION['order'] = $order; // permet de récupérer le tableau $order avec la super globale $_SESSION. L'information reste disponible tant que les cookies ne sont pas supprimées ou qu'une nouvelle commande n'est pas réalisée. En l'état n'affiche que la dernière commande réalisée/en attente.
    }
}

function findOrderByUser() {
    if (isset($_SESSION['order'])) {
        return $_SESSION['order'];
    }

    else {
        return null;
    }
}

?>