<?php

namespace App\Controller;

use App\Model\ProductManager;
use App\Service\Form;

class AdminController extends AbstractController
{
    //?ctrl=admin&action=index
    public function index()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        $manager = new ProductManager();
        $products = $manager->findAll();

        return $this->render("admin/home.php", [
            "products" => $products
        ]);
    }

    //?ctrl=admin&action=addProduct
    public function addProduct()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $name = Form::getData("name", "text");
            $price = Form::getData("price", "float", FILTER_FLAG_ALLOW_FRACTION);
            $descr = Form::getData("descr", "text");

            if($name && $price && $descr){
                $manager = new ProductManager();
                if($newId = $manager->insertProduct($name, $price, $descr)){
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=store&action=product&id=$newId");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }

    public function updateProduct($id)
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        $manager = new ProductManager();

        if(Form::isSubmitted()){
            $name = Form::getData("name", "text");
            $price = Form::getData("price", "float", FILTER_FLAG_ALLOW_FRACTION);
            $descr = Form::getData("descr", "text");

            if($name && $price && $descr){
            
                if($manager->updateProduct($id, $name, $price, $descr)){
                    $this->addFlash("success", "Le produit ".$name." a été modifié avec succès !!");
                    return $this->redirect("?ctrl=admin");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");
        }

        $products = $manager->findAll();
        $product = $manager->findOneById($id);

        return $this->render("admin/home.php", [
            "products"     => $products,
            "prodToUpdate" => $product
        ]);
    }

    public function deleteProduct($id){

        $manager = new ProductManager();
        $product = $manager->findOneById($id);

        if($manager->deleteProduct($id)){
            $this->addFlash("success", "Le produit ".$product["name"]." a été supprimé avec succès !!");
        }
        else $this->addFlash("error", "Erreur de BDD !!");

        return $this->redirect("?ctrl=admin");
    }
}