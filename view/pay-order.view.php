<?php

require_once('partial/header.php');


?>
<main>
        <h2>Payer une commande</h2>
        <?php if($orderForUser) { ?>
            <p>Vous avez commandé : <?php echo $orderForUser['quantity'] ?> : <?php echo $orderForUser['teeshirt'] ?></p>
            <p>Créée le : <?php echo $orderForUser['created_at']?></p>
            <p>Status : <?php echo $orderForUser['status'] ?></p>
        <button class="submit2">Payer</button>
        <?php } else { ?>
            <p> Vous n'avez pas réalisé de commande.</p>
      <?php  } ?>
</main>

<?php

require_once('partial/footer.php');

?>