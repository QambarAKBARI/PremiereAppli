<?php

    use App\Service\Session;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title>STORE</title>
</head>
<body>
    <header>
        <nav>
            <span>
                <img src="https://via.placeholder.com/80.png?text=LOGO" alt="logo">
            </span>
            <a href="?ctrl=store">Accueil</a>
            <a href="?ctrl=cart">Panier (<?= Session::getFullQtt() ?>)</a>
            <?php
                if($user = Session::get("user")){
                    if($user["role"] == "ROLE_ADMIN"){
                        ?>
                        <a href="?ctrl=admin">Administration</a>
                        <?php
                    }
                    ?>
                    <span><?= $user['username'] ?></span>
                    <a href="?ctrl=security&action=logout">Déconnexion</a>
                    <?php
                }
                else{
                    ?>
                    <a href="?ctrl=security&action=login">Connexion</a>
                    <a href="?ctrl=security&action=register">Inscription</a>
                    <?php
                }
            ?>
        </nav>
        <?php
            if($message = Session::get("message")){
                ?>
                <p id="message" class='<?= $message['type'] ?>'>
                    <?= $message['msg'] ?> 
                </p>
                <?php
                Session::remove("message");
            }
        ?>
    </header>

    <main>
        <?= $content ?>
    </main>
    
    <footer>
        &copy; 2021 - Store - All Rights Reserved
    </footer>
</body>
</html>