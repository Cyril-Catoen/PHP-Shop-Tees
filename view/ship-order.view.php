<?php

require_once('partial/header.php');


?>
<main>
<h2>Expédier votre commande</h2>
        <?php if($orderForUser) { ?>
            <p>Vous avez commandé et payé : <?php echo $orderForUser['quantity'] ?> : <?php echo $orderForUser['teeshirt'] ?></p>
            <p>Créée le : <?php echo $orderForUser['created_at']?></p>
            <p>Status : <?php echo $orderForUser['status'] ?></p>
            <?php if($orderForUser['status'] == "PAID" || $orderForUser['status'] == "SENT") {  
                        echo "<br><p class='green'>" . $message . "</p>";
                   } else {
                       echo "<br><p class='red'>" . $message . "</p>";
                 } ?>
        <form method="POST" action=""><button class="submit2" type="submit">Expédier</button></form>
            <?php } else {  ?>
                        <p>Vous n'avez pas réalisé de commande ou ne l'avez pas payé.</p>
            <?php  } ?>
</main>

<?php

require_once('partial/footer.php');

?>