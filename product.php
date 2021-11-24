
<?php
    ob_start();
    include "db_functions.php";
    include "functions.php";
    
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if(!$id || !$product = findOneById($id)){
        setMessage("error", "Le produit demandé n'existe pas...");
        redirect("index.php");
    }

?>
    <div class='product-info'>
        <h2><?= $product['name']?></h2>
        <p><?= $product['description']?></p>
        <p><?= number_format($product['price'], 2, ",","&nbsp;")?>&nbsp;€</p>
        <a href="traitement.php?action=addProd&id=<?= $product['id'] ?>">Ajouter au panier</a>
    </div>

    <?php
    $titre = "Produit";
    $result = ob_get_clean();
    require "template.php";
    ?>
                