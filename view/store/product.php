<?php
    $product =  $response["data"]["product"];
?>

<p>
    <a href="/">&ltrif;&nbsp;Retour</a>
</p>
<section class="single-product">
    <figure class="single-product__image">
        <img src="https://via.placeholder.com/300.png?text=<?= $product["name"] ?>" alt="">
    </figure>
    <div class="single-product__infos">
        <h1><?= $product["name"] ?></h1>
        <p><?= $product["description"] ?></p>
        <p><?= number_format($product["price"], 2, ',', ' ') ?>&nbsp;&euro;</p>
        <p>
            <a href="?ctrl=cart&action=addToCart&id=<?= $product["id"] ?>">Ajouter au panier</a>
        </p>
    </div>
    
</section>
