
<form action="?ctrl=security&action=register" method="post">
    <p>
        <label>
            Nom d'utilisateur :
            <input type="text" name="username" required>
        </label>
    </p>
    <p>
        <label>
            Adresse e-mail :
            <input type="email" name="email" required>
        </label>
    </p>
    <p>
        <label>
            Mot de passe :
            <input type="password" name="pass1" required>
        </label>
    </p>
    <p>
        <label>
            Répétez le mot de passe :
            <input type="password" name="pass2" required>
        </label>
    </p>
    <p>
        <input type="submit" value="Inscription">
    </p>
</form>
    