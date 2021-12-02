<?php

namespace App\Model;

abstract class AbstractManager
{
    private static $connexion;

    /**
     * Retourne une instance de PDO, représentant la connexion à la base de données
     * @return \PDO un objet instance de PDO, connecté à la base de données
     */
    protected static function connect()
    {
        self::$connexion = new \PDO(
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

    protected function executeQuery($sql, $params = null)
    {
        $stmt = self::$connexion->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    protected function getLastInsertId()
    {
        return intval(self::$connexion->lastInsertId());
    }
}