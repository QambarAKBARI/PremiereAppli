<?php
    session_start();
    include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
<?php
     include "menu.php";
    ?>
    <section id="formulaire">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=addProd" method="POST">
            <p>
                <label for="nom">
                    Nom du produit :
                    <input type="text" class="texte" name="name" id="name">
                </label>
            </p>
            <p>
                <label for="prix">
                    Prix du produit :
                    <input type="number" name="price" step="any" id="price">
                </label>
            </p>
            <p>
                <label for="nom">
                    Quantité désirée :
                    <input type="number" name="qtt" id="qtt" value="1">
                </label>
            </p>
            <p>
                <input class="submit" type="submit" name="submit" id="submit" value="Ajouter le produit">
            </p>
        </form>
        <?php if(array_key_exists('errors', $_SESSION)): ?>
            <div class="errors">
                <?= $_SESSION['errors'];?>
            </div>
        <?php unset($_SESSION['errors']); endif; ?>    
    </section>
    

</body>
</html>