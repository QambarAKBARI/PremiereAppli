<?php
    
?>
    <form action="security.php?action=register" method="post">
        <p>
            <label for="">
                Nom d'utilisateur :
                <input type="text" name="username" required>
            </label>
        </p>
        <p>
            <label for="">
                Adresse e-mail :
                <input type="email" name="email" required>
            </label>
        </p>
        <p>
            <label for="">
                Mot de passe:
                <input type="password" name="pass1" required>
            </label>
        </p>
        <p>
            <label for="">
                Répétez le mot de passe :
                <input type="password" name="pass2" required>
            </label>
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Inscription">
        </p>
    </form>
