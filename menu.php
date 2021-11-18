
    
    <nav>
        <div class="shopping-basket">
            <?php
                
                if(preg_match("/recap.php/", $_SERVER["REQUEST_URI"])){
                    echo "<div><a href='traitement.php?action=deleteAll'><i class='fas fa-trash-alt fa-3x'></i></a></div>";
                }
            ?>
            <div class="shopping-cart">
                <a class="panier" href="recap.php"><i class="fas fa-shopping-cart fa-4x"></i></a>
                <p class='nb-product'><?= getFullQtt() ?></p>   
            </div>

        </div>
        <div class="home">
            <a href="index.php"><i class="fas fa-home fa-4x"></i></a>
            <a href="admin.php"><i class="fas fa-user-lock fa-4x admin"></i></a>  
        </div>
        
    </nav>
<?= getMessage() ?>