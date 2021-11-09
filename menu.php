<?php
    $nb = 0;
        foreach($_SESSION['products'] as $index => $product){
            $nb += $product['qtt'];
        }
?>
    <nav>
        <a class="panier" href="recap.php"><img src='img/panier.jpg' alt="panier"><p class='rouge'><?=$nb?></p></a>
        <a href="index.php">Acceuil</a>  
    </nav>
