<?php
session_start();
include "db_functions.php";
include "functions.php";
$products = findAll();

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container">
        

        <?php
            
            foreach($products as $product){
                ?>
                <div class='product'>
                    <h2>
                        <a href="product.php?id=<?= $product['id'] ?>">
                            <?= $product['name']?>
                        </a>
                    </h2>
                    <p><?= substr($product['description'], 0, 50)?></p>
                    <p><?= number_format($product['price'], 2, ",","&nbsp;")?>&nbsp;€</p>
                    <a href="traitement.php?action=addProd&id=<?= $product['id'] ?>">Ajouter au panier</a>
                </div>
                <?php
            }
        ?>
    </div>
</body>
</html>