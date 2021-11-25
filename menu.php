<?php
?>
<nav>
    <div class="shopping-basket">
        <?php
            
            if(preg_match("/recap.php/", $_SERVER["REQUEST_URI"])){
                echo "<div class='btn-supprime'><a href='traitement.php?action=deleteAll'><i class='fas fa-trash-alt fa-3x'></i></a></div>";
            }
            if(preg_match("/admin.php|index.php|recap.php|product.php/", $_SERVER["REQUEST_URI"])){
                ?>
                <div class="shopping-cart">
                    <a class="panier" href="recap.php"><i class="fas fa-shopping-cart fa-4x"></i></a>
                    <p class='nb-product'><?= getFullQtt() ?></p>   
                </div>

                </div>
                <div class="home">
                        <div id="bircolage">
                            <a href="index.php"><i class="fas fa-home fa-4x"></i></a>
                            <a href="admin.php"><i class="fas fa-user-lock fa-4x admin"></i></a>  
                    <?php
                        if(isset($_SESSION['user'])){
                            ?>
                            <a href="security.php?action=logout"><i class="fas fa-sign-out-alt fa-4x"></i></a>
                        </div>
                            <span <?= $_SESSION['user']['username']?>></span>

                            <?php
                        }else{
                            ?>
                            <a href="register.php">REGISTER</a>
                            <a href="login.php">LOGIN</a>
                            <?php
                        }
                    ?>
                </div>
                <?php
            }else{
                ?>
                <div id="register">

                    <div class="option"><a href="register.php"><i class="fas fa-file-signature fa-4x"></i></a></div>
                    <div class="option"><a href="login.php"><i class="fas fa-sign-in-alt fa-4x"></i></a></div>
                </div>    
                <?php
            }
        ?>

    
</nav>
<?= getMessage() ?>