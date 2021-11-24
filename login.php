<?php
    ob_start();
    session_start();
    
?>
    <form action="security.php?action=login" method="post">
        <p>
            <label for="">
                Nom d'utilisateur ou adresse e-mail:
                <input type="text" name="credentials" required>
            </label>
        </p>
        <p>
            <label for="">
                Mot de passe:
                <input type="password" name="password" required>
            </label>
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Connexion">
        </p>
    </form>
    <?php
$titre = "Connexion";
$result = ob_get_clean();
require "template.php";