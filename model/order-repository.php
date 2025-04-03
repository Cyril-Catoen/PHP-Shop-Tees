<?php 

function createOrder() {
    if (array_key_exists('quantity', $_POST) && array_key_exists('teeshirt', $_POST)) {
        $order=[
            "quantity" => $_POST['quantity'] , // récupère la valeur de la quantité dans l'input quantity une fois le formulaire soumis
            "teeshirt" => $_POST['teeshirt'] // recupère la valeur du modèle de t-shirt dans le select teeshirt une fois le formulaire soumis
            ] ; 
            return $order;
    }
    
    else {
        return null ;
    }
}

function saveOrder($order) {
    if ($order){
    $_SESSION['order'] = $order; // permet de récupérer le tableau $order avec la super globale $_SESSION. L'information reste disponible tant que les cookies ne sont pas supprimées ou qu'une nouvelle commande n'est pas réalisée. En l'état n'affiche que la dernière commande réalisée/en attente.
    $message = "Vous avez commandé " . $order['quantity'] . " t-shirt(s) modèle " . $order['teeshirt'] . "."; //concatène un message composé de texte prédéfinis et des valeurs récupérés de quantité et du modèle de t-shirt   
    $_SESSION['message'] = $message;
    }
    else {
    $_SESSION['message'] = "Aucune commande valide n'a été effectuée.";
    }
}

?>