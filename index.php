<?php
ob_start();
session_start();
include "db_functions.php";
include "functions.php";
$products = findAll();

?>
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
                    <a href="traitement.php?action=addToCart&id=<?= $product['id'] ?>">Ajouter au panier</a>
                </div>
                <?php
            }
        ?>
    </div>
    <?php
    $titre = "Tous les produits";
    $result = ob_get_clean();
    require "template.php";
    ?>