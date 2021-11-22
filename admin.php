<?php
    session_start();
    include "functions.php";
    include "db_functions.php";

    $products = findAll();

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    
    $prodToUpdate = null;
    $formAction = "db_traitement.php?action=addProd";

    if($id && $prod = findOneById($id)){
        $prodToUpdate = $prod;
        $formAction = "db_traitement.php?action=updateProd&id=$id";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title><?= $prodToUpdate ? "Modifier" : "Ajouter" ?> produit</title>
</head>
<body>
<?php
     include "menu.php";
    ?>
    <section id="formulaire">
        <h1><?= $prodToUpdate ? "Modifier" : "Ajouter" ?> un produit</h1>
        <form action="<?= $formAction ?>" method="POST">
            <p>
                <label for="nom">Nom du produit :
                <input type="text" class="texte" name="name" id="name" value="<?= $prodToUpdate ? $prodToUpdate["name"] : "" ?>">
                </label>
            </p>
            <p>
                <label for="price">Prix du produit :
                <input type="number" name="price" step="any" id="price" value="<?= $prodToUpdate ? $prodToUpdate["price"] : "" ?>">
                </label>
            </p>
            <p>
                <label for="descr">Description du produit:
                <textarea name="description" id="descr" cols="30" rows="10" value="<?= $prodToUpdate ? $prodToUpdate["description"] : "" ?>"></textarea>
                </label>
            </p>
            <p>
                <input class="submit" type="submit" name="submit" id="submit" value="Ajouter le produit">
            </p>
        </form>
    </section>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>DESCRIPTION</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($products as $prod){
                ?>
                <tr>
                    <td><?= $prod["id"] ?></td>
                    <td><?= $prod["name"] ?></td>
                    <td><?= $prod["price"] ?></td>
                    <td><?= $prod["description"] ?></td>
                    <td>
                        <a href="admin.php?id=<?= $prod["id"] ?>"><i class="fas fa-tools fa-2x"></i></a> OU 
                        <a href="db_traitement.php?action=deleteProd&id=<?= $prod["id"] ?>"><i class='fas fa-trash-alt fa-2x'></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    

</body>
</html>