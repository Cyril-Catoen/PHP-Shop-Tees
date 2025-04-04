<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Permet de configurer le site en responsive -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- Import du fichier style.css -->
        <link rel="stylesheet" href="../css/style.css?v=<?= time(); ?>" />

        <!-- Nomme l'onglet du navigateur -->
        <title>T-shirt shop</title>
</head>

<body>
<header>
    <nav>
        <ul>
           <li><a href="create-order.controller.php">Commander</a></li>
           <li><a href="see-order.controller.php">Comfirmer ou Annuler</a></li>
            <li><a href="pay-order.controller.php">Payer</a></li>
        </ul>
    </nav>
</header>