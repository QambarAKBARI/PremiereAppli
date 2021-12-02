<?php
use App\Service\Session;
$cart = Session::get("cart");

if(!$cart){
    ?>
    <p>Votre panier est vide...</p>
    <?php
}
else{
    ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalGeneral = 0;
            
            foreach($cart as $index => $product){
                //on calcule le total de la ligne ici
                $totalLigne = $product['price']*$product['qtt'];
                ?>
                <tr>
                    <td><a href='?ctrl=cart&action=deleteProd&index=<?= $index ?>'>Supprimer</a></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= number_format($product['price'], 2, ",", "&nbsp;") ?>&nbsp;€</td>
                    <td>
                        <a href='?ctrl=cart&action=decreaseQtt&index=<?= $index ?>'>&minus;</a>
                        <?= $product['qtt'] ?>
                        <a href='?ctrl=cart&action=increaseQtt&index=<?= $index ?>'>&plus;</a>
                    </td>
                    <td><?= number_format($totalLigne, 2, ",", "&nbsp;")?>&nbsp;€</td>
                </tr>
                <?php
                $totalGeneral += $totalLigne;
            }
            ?>
            <tr>
                <td colspan=3></td>
                <td><?= Session::getFullQtt() ?></td>
                <td><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?>&nbsp;€</strong></td>
            </tr>
        </tbody>
    </table>
    <p>
        <a href="?ctrl=cart&action=deleteAll">Vider le panier</a>
    </p>
    <?php
    }
?>