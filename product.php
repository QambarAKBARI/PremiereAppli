
<?php
    include "db_functions.php";
    include "functions.php";
    
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if(!$id || !$product = findOneById($id)){
        setMessage("error", "Le produit demandé n'existe pas...");
        redirect("index.php");
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
    <title>Product</title>
</head>
<body>
    <?php
         include "menu.php";
    ?>
    <div class='product-info'>
        <h2><?= $product['name']?></h2>
        <p><?= $product['description']?></p>
        <p><?= number_format($product['price'], 2, ",","&nbsp;")?>&nbsp;€</p>
        <a href="traitement.php?action=addProd&id=<?= $product['id'] ?>">Ajouter au panier</a>
    </div>
</body>
</html>


               