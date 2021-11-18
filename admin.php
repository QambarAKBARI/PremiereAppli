<?php
    session_start();
    include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
<?php
     include "menu.php";
    ?>
    <section id="formulaire">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=addDataBase" method="POST">
            <p>
                <label for="nom">Nom du produit :</label><br>
                <input type="text" class="texte" name="name" id="name">
            </p>
            <p>
                <label for="price">Prix du produit :</label><br>
                <input type="number" name="price" step="any" id="price">
            </p>
            <p>
                <label for="descr">Description :</label><br>
                <textarea name="description" id="descr" cols="30" rows="10"></textarea>
            </p>
            <p>
                <input class="submit" type="submit" name="submit" id="submit" value="Ajouter le produit">
            </p>
        </form>
 
    </section>
    

</body>
</html>