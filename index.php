
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="POST">
        <p>
            <label for="nom">
                Nom du produit :
                <input type="text" name="name" id="name">
            </label>
        </p>
        <p>
            <label for="prix">
                Prix du produit :
                <input type="number" name="price" step="any" id="price">
            </label>
        </p>
        <p>
            <label for="nom">
                Quantité désirée :
                <input type="number" name="qtt" id="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Ajouter le produit">
        </p>
    </form>
</body>
</html>