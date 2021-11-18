<?php
    session_start();
    include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
        
        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <?php include "menu.php"; ?>

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
                        <td><?= getFullQtt() ?></td>
                        <td><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?>&nbsp;€</strong></td>
                        <td><a href='traitement.php?action=deleteAll'><i class="fas fa-trash-alt fa-3x"></i></a></td>
                    </tr>
                </tbody>
            </table>

            <?php
            }
        ?>
        
    </body>
</html>