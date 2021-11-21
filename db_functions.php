<?php
    function connexion(){
        return new \PDO(
            "mysql:dbname=store;host=localhost:3306",
            "root",
            "",
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ]
        );
    }

/*    $id = 4;
    $sql = "SELECT * FROM personnage WHERE id_personnage = :id";
    $stmt = $db->prepare($sql);//utilise prepare uniquement quand requète contient des params (:xxx)
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    var_dump($stmt->fetch()); */

    /**
     * retourne tous les produits de la base de données
     * @return array|false  renvoi un tableau contenant les produits sous form de tableau, si le tableau est vide renvoie false
     */
    function findAll(){
        $db = connexion();
        $sql = "SELECT * FROM product ";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * retourne le produit demandé de la base de données 
     * @param int     $id l'id du produit 
     */
    function findOneById($id){
        $db = connexion();
        $sql = "SELECT * FROM product WHERE id = :id ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    /**
     * insère un produit en base de données 
     * @param string     $name le nom du produit
     * @param string     $descr la description de produit
     * @param float|int  $price le prix du produit
     * 
     * @return int l'ID du produit nouvellement ajouté
     */
    function insertProduct($name, $descr, $price){
        $db = connexion();
        $sql = "INSERT INTO product (name, description, price)
                VALUES(:n, :d, :p)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":n", $name);
        $stmt->bindParam(":d", $descr);
        $stmt->bindParam(":p", $price);
        $stmt->execute();
        return $db->lastInsertId();
    }

