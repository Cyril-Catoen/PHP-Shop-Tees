<?php 

function createOrder() {
        if ($_POST['quantity'] > 0 && $_POST['quantity'] <= 3) {
            $order=[
                "quantity" => $_POST['quantity'] , // récupère la valeur de la quantité dans l'input quantity une fois le formulaire soumis
                "teeshirt" => $_POST['teeshirt'] // recupère la valeur du modèle de t-shirt dans le select teeshirt une fois le formulaire soumis
            ] ; 

            return $order;
        }

        else {
            return false;
        }
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