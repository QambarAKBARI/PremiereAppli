<?php
    session_start();
    include "functions.php";
    include "db_functions.php";

    $action = filter_input(INPUT_GET, "action", FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "/addProd|updateProd|deleteProd/"
        ]
    ]);

    if($action){

        switch($action){

            case "addProd":
                if(isset($_POST['submit'])){

                    $name= filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, [
                        "options" => [
                            "min_range" => 0
                        ],
                        "flags" => FILTER_FLAG_ALLOW_FRACTION
                    ]);
                    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
            
                    if($name && $price && $description){
                        if($id = insertProduct($name, $description, $price)){
                            setMessage("success", "Produit $name ajouté avec succès !"); 
                            redirect("product.php?id=$id");
                        }else{
                            setMessage("notice", "Vérifiez les données du formulaire !");
                        }
                    }else setMessage("notice", "Vérifiez les données du formulaire !");
                }
                else{
                    setMessage("error", "Sale pirate, tu valides le formulaire STP !");
                }
                break;
            case "updateProd" :
                break;
            case "deleteProd": 

                break;

        }
    }

    redirect("admin.php");