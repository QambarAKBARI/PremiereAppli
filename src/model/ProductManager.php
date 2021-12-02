<?php

namespace App\Model;


class ProductManager extends AbstractManager
{
    public function __construct()
    {
        parent::connect();
    }
    /**
     * Retourne tous les produits de la base de données
     * 
     * @return array|false 
     * Renvoie un tableau contenant les produits sous forme de tableau, 
     * un tableau vide si aucun produit n'est présent en base
     * ou FALSE si la requète a échoué
     */
    public function findAll()
    {
        $stmt = $this->executeQuery(
            "SELECT * FROM product"
        );
        return $stmt->fetchAll();
    }

    /**
     * Retourne le produit en base de données correspondant à l'id en paramètre
     * 
     * @param int $id l'identifiant du produit en BDD
     * @return array|false un tableau contenant les champs du produit ou FALSE si aucun produit n'a été récupéré
     */
    public function findOneById($id)
    {
        $stmt = $this->executeQuery(
            "SELECT * FROM product WHERE id = :id",
            [
                "id" => $id
            ]
        );
        return $stmt->fetch();
    }

    /**
     * Insère un produit en base de données et renvoie son ID 
     * 
     * @param string    $name  le nom du produit
     * @param float|int $price le prix du produit
     * @param string    $descr la description du produit
     * 
     * @return int|null l'ID du produit nouvellement inséré en BDD, null si l'ajout a échoué
     */
    public function insertProduct($name, $price, $descr)
    {
        $this->executeQuery(
            "INSERT INTO product (name, price, description) VALUES (:n, :p, :d)",
            [
                ":n" => $name,
                ":p" => $price,
                ":d" => $descr
            ]
        );
        return $this->getLastInsertId();
    }

    /**
     * Met à jour le produit répondant à $id avec les $name, $price et $descr fournis
     * 
     * @param string $id l'id du produit à modifier
     * @param string $name le nouveau nom du produit
     * @param string $price le nouveau prix du produit
     * @param string $descr la nouvelle description du produit
     * 
     * @return bool TRUE si succès de la requète de mise à jour, FALSE sinon
     */
    public function updateProduct($id, $name, $price, $descr, $image = null)
    {
        return $this->executeQuery(
            "UPDATE product 
            SET name = :n, price = :p, description = :d
            WHERE id = :id",
            [
                ":id" => $id,
                ":n"  => $name,
                ":p"  => $price,
                ":d"  => $descr,
            ]
        );
    }

    /**
     * Supprime le produit répondant à l'id donné en paramètre
     * 
     * @param string $id l'identifiant du produit à supprimer
     * 
     * @return bool TRUE si succès de la requète de suppression, FALSE sinon
     */
    public function deleteProduct($id){
        return $this->executeQuery(
            "DELETE FROM product WHERE id = :id",
            [
                ':id' => $id 
            ]
        );
    }

    /**
     * Récupère tous les produits dont le prix est compris entre min et max
     * 
     * @param float $min le prix minimum à vérifier
     * @param float $max le prix maximum à vérifier
     * 
     * @return array|false un tableau des produits récupérés ou non, FALSE si la requète échoue
     */
    public function findByPrice($min, $max)
    {
        $stmt = $this->executeQuery(
            "SELECT * FROM product WHERE price BETWEEN :min AND :max",
            [
                ":min" => $min,
                ":max" => $max
            ]
        );
        return $stmt->fetchAll();
    }
}
