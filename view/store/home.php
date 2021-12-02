<?php
    $products = $response["data"]["products"];
?>
<section class="products">
    <?php  
        foreach($products as $prod)
        {
        ?>
            <div class="products__item">
                <h2>
                    <a href="?ctrl=store&action=product&id=<?= $prod['id'] ?>">
                        <?= $prod["name"] ?>
                    </a>
                </h2>
                <p><?= mb_strimwidth($prod["description"], 0, 50, "...") ?></p>
                <p><?= number_format($prod["price"], 2, ',', ' ') ?>&nbsp;&euro;</p>
                <p>
                    <a href="?ctrl=cart&action=addToCart&id=<?= $prod["id"] ?>">Ajouter au panier</a>
                </p>
            </div>
        <?php
        }
    ?>
</section>
