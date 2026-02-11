<?php

Class DBConnect
{
    function getPDO()
    {
        try {
            $pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo; 
        } catch (\PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage()); 
        }

    }
}