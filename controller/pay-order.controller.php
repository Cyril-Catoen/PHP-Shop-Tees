<?php 

require_once('../config.php');
require_once('../model/order-repository.php');


session_start(); // démarre la session, permet de créer un identifiant unique sauvegardé dans les cookies du navigateur de l'utilisateur
$orderForUser = findOrderByUser();

require_once('../view/pay-order.view.php');
?>