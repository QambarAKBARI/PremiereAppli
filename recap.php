<?php
    ob_start();
    session_start();

    function getFullQtt1(): int
    {
        if(isset($_SESSION['products']) && !empty($_SESSION['products'])){
            return array_reduce($_SESSION["products"], function($acc, $prod){
                return $acc + $prod["qtt"];
            }, 0);
        }
        else return 0;
    }
?>
        <?php
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            ?>
            <h2>Aucun produit en session...</h2>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalGeneral = 0;
                    
                    foreach($_SESSION['products'] as $index => $product){
                        //on calcule le total de la ligne ici
                        $totalLigne = $product['price']*$product['qtt'];
                        ?>
                        <tr>
                            <td><?= $index ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format($product['price'], 2, ",", "&nbsp;") ?>&nbsp;€</td>
                            <td>
                                <a href='traitement.php?action=updateQtt&id=<?= $index ?>&mode=decr'>&minus;</a>
                                <?= $product['qtt'] ?>
                                <a href='traitement.php?action=updateQtt&id=<?= $index ?>&mode=incr'>&plus;</a>
                            </td>
                            <td><?= number_format($totalLigne, 2, ",", "&nbsp;")?>&nbsp;€</td>
                            <td><a href='traitement.php?action=deleteProd&id=<?=$index?>'><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                        $totalGeneral += $totalLigne;
                    }
                    ?>
                    <tr>
                        <td colspan=3>Total</td>
                        <td><?= getFullQtt1() ?></td>
                        <td><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?>&nbsp;€</strong></td>
                        <td><a href='traitement.php?action=deleteAll'><i class="fas fa-trash-alt fa-3x"></i></a></td>
                    </tr>
                </tbody>
            </table>

            <?php
            }
        ?>
<?php
$titre = "Récapitulatif des produits";
$result = ob_get_clean();
require "template.php";
?>