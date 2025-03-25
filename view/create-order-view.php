<?php

require_once('partial/header.php');

?>
<main>
        <h2>Réaliser une commande</h2>
        <!-- Création du formulaire -->

    <form method="POST" action="">
    <div class="w80">
                <input type="number" name="quantity" placeholder="Saisissez la quantité">
        </div>

    <div class="w80">
        <select name="teeshirt">
                <option selected disabled>Choisissez votre modèle de t-shirt</option>
                <option value="GetJinxed">T-shirt Get Jinxed!</option>
                <option value="DontGetMeWrong">T-shirt Don't get me wrong !</option>
                <option value="PieceOfCake">T-shirt Piece of cake</option>
        </select>
    </div>
    <button type="submit">Commander</button>
</form>

    <!-- Appel de la variable $message pour afficher le texte de succès de la commande -->
    <h3><?php echo $message ?></h3>

</main>

<?php

require_once('partial/footer.php');

?>