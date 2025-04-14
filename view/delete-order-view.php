<?php

require_once('partial/header.php');


?>
<main>
    <h2>Supprimer votre historique commande</h2>

    <?php if ($orderForUser) { ?>
        <p>Vous avez commandé et payé : <?php echo $orderForUser['quantity'] ?> : <?php echo $orderForUser['teeshirt'] ?></p>
        <p>Créée le : <?php echo $orderForUser['created_at']?></p>
        <p>Status : <?php echo $orderForUser['status'] ?></p>

        <form method="POST" action="">
            <button class="submit2" type="submit">Supprimer l'historique</button>
        </form>

    <?php } elseif ($orderJustDeleted) { ?>
        <p class="green"><?php echo $message; ?></p>

    <?php } else { ?>
        <p>Vous n'avez pas de commande connue.</p>
    <?php } ?>
</main>

<?php

require_once('partial/footer.php');

?>