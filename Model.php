<?php

abstract class Model
{
    private static $pdo;

    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=vtc;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        //On vérifie qu'il n y a aucune connection à la Bdd, si null on lance la function setBdd
        if (self::$pdo === null) {
            self::setBdd();
        }

        //On retourne la connexion à la Bdd
        return self::$pdo;
    }
}
