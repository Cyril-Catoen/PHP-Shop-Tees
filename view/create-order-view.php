<?php

require_once('partial/header.php');

// // Vérifier si une commande existe en session
// if (array_key_exists("order", $_SESSION)) {
//         $order = $_SESSION["order"]; // Récupére la commande
    
//         // Afficher la commande avec les valeurs.
//         echo "<p>Votre dernière commande : " . $order["quantity"] . 
//              " t-shirt(s) modèle " . $order["teeshirt"] . ".</p>";
// }

// Vérifier si une commande existe en session

if ($orderByUser) {

    // Afficher la commande avec les valeurs.
    echo "<p>Votre dernière commande : " . $orderByUser["quantity"] . 
         " t-shirt(s) modèle " . $orderByUser["teeshirt"] . ".</p><br><p>Créée le : " . $orderByUser['created_at'] . "<br><p>Status : " . $orderByUser['status'] . ".</p>";
}


?>
<main>
        <h2>Réaliser une commande</h2>
        <!-- Création du formulaire en méthode POST pour que les données soumises du formulaire puissent être récupérées dans la page. Par défaut le formulaire est en GET si rien n'est précisé.-->

    <form method="POST" action="">
    <div class="w80">
        <!-- Créer une ligne de formulaire où il faut entrer une quantité en valeur numérique -->
                <input type="number" name="quantity" placeholder="Saisissez la quantité"> 
        </div>

    <div class="w80">
        <!-- Créer une ligne de formulaire de type select pour offrir à l'utilisateur un choix multiples entre des valeurs prédéfinies. -->
        <select name="teeshirt">
                <!-- On insère une option en selected disabled pour qu'aucune option à valeur soit présélectionné de base et indiquer à l'utilisateur la marche à suivre -->
                <option selected disabled>Choisissez votre modèle de t-shirt</option>
                <!-- <option value="GetJinxed">T-shirt Get Jinxed!</option> -->
                <!-- <option value="DontGetMeWrong">T-shirt Don't get me wrong !</option> -->
                <!-- <option value="PieceOfCake">T-shirt Piece of cake</option> -->

                <!-- On réalise une boucle pour proposer tous les choix de produits -->
                <?php foreach ($products as $product) { ?>
                    <option value="<?php echo $product ?>">T-shirt <?php echo $product ?></option>
               <?php } ?>

        </select>
    </div>
    <button class="submit" type="">Commander</button>
</form>

    <!-- Appel de la variable $message pour afficher le texte de succès ou d'erreur de la commande. En cas de succès, le message apparaît en vert, autrement en rouge -->
    <!-- on utilise une version simplifié de if / else pour le choix de la classe green or red dans h3 avec === et ? 'classe1' : 'classe2'. Cela revient à écrire si $message est de type success alors on echo la classe green sinon (else) on echo la classe red -->
    <?php if ($message) { ?> 
        <h3 class="<?php echo $message['type'] === 'success' ? 'green' : 'red'; ?>"><?php echo $message['message']; ?></h3> 
    <?php } ?>

</main>

<?php

require_once('partial/footer.php');

?>