<?php

namespace App\Controller;
use App\Model\ProductManager;
class StoreController extends AbstractController
{
    //?ctrl=store&action=index
    public function index()
    {
        $pmanager = new ProductManager();
        $products = $pmanager->findAll();
        
        return $this->render("store/home.php", [
            "products" => $products
        ]);
    }

    //?ctrl=store&action=product&id=XX
    public function product($id)
    {
        $manager = new ProductManager();
        $product = $manager->findOneById($id);

        if(!$product) return false;

        return $this->render("store/product.php", [
            "product" => $product
        ]);
    }
    
}