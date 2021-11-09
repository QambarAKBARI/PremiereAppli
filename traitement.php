<?php

session_start();

$errors = [];

if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    $nbProduits = 0;
    if($name && $price && $qtt){
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt   
        ];
 
        $_SESSION['products'][] = $product;
        $errors = "Votre produit a été ajouté au panier";
       
    }else{
        $errors = "Veuillez remplir tous les champs";
    }
     $_SESSION['errors'] = $errors;
}

header("Location:index.php");
die; 






?>
