<?php

require_once('partial/header.php');


?>
<main>
        <h2>Annuler ou confirmer votre commande</h2>
        <?php if($orderForUser) { ?>
            <p>Vous avez commandé : <?php echo $orderForUser['quantity'] ?> : <?php echo $orderForUser['teeshirt'] ?></p>
            <p>Créée le : <?php echo $orderForUser['created_at']?></p>
            <p>Status : <?php echo $orderForUser['status'] ?></p>
        <form method="POST" action=""><button class="submit2" type="submit">Annuler</button></form>
        <?php } else { ?>
            <p> Vous n'avez pas réalisé de commande.</p>
      <?php  } ?>
</main>

<?php

require_once('partial/footer.php');

?>