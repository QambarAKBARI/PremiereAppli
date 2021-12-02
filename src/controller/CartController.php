<?php

namespace App\Controller;

use App\Service\Session;
use App\Model\ProductManager;

class CartController extends AbstractController
{
    public function index()
    {
        return $this->render("store/recap.php");
    }
    
    //?ctrl=cart&action=addToCart&id=XX
    public function addToCart($id)
    {
        $cart = Session::get("cart") ?? Session::add("cart", []);

        $prodInSession = array_filter($cart, function($prod) use($id){
            return $id == $prod["id"];
        });

        if(empty($prodInSession)){
            $manager = new ProductManager();
            if($product = $manager->findOneById($id)){
                $product["qtt"] = 1;
                $cart[] = $product;
                $this->addFlash("success", "Produit ".$product["name"]." ajouté avec succès ! <a href='recap.php'>Voir le panier</a>");
            }
            else{
                $this->addFlash("error", "Un problème est survenu avec la BDD, veuillez réessayer !");
            }
        }
        else{
            $key = key($prodInSession);
            $cart[$key]["qtt"]++;
            $this->addFlash("success", "Produit ".$prodInSession[$key]["name"]." a vu sa quantité augmenter ! <a href='recap.php'>Voir le panier</a>");
        }

        Session::add("cart", $cart);
        return $this->redirect("?ctrl=cart");
    }

    public function increaseQtt()
    {
        $cart = Session::get("cart");

        $index = filter_input(INPUT_GET, "index", FILTER_VALIDATE_INT);
            
        $cart[$index]["qtt"]++;
         
        Session::add("cart", $cart);
        return $this->redirect("?ctrl=cart");
    }

    public function decreaseQtt()
    {
        $cart = Session::get("cart");

        $index = filter_input(INPUT_GET, "index", FILTER_VALIDATE_INT);

        $cart[$index]["qtt"]--;
                    
        if($cart[$index]["qtt"] == 0){
            return $this->redirect("?ctrl=cart&action=deleteProd&index=$index");
        }

        Session::add("cart", $cart);
        return $this->redirect("?ctrl=cart");
    }

    public function deleteProd()
    {
        $cart = Session::get("cart");
        
        $index = filter_input(INPUT_GET, "index", FILTER_VALIDATE_INT);
        
        unset($cart[$index]);
        if(empty($cart)){//si c'était le dernier produit du panier...
            return $this->redirect("?ctrl=cart&action=deleteAll");
        }

        Session::add("cart", $cart);
        return $this->redirect("?ctrl=cart");
    }

    public function deleteAll()
    {
        Session::remove("cart");
        return $this->redirect("?ctrl=cart");
    }
}