<?php

class ContactManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //fonction pour trouver tous les contacts dans la base de données et les retourner sous forme d'objets Contact
    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM contact');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $contacts = [];
        foreach ($results as $row) {
            $contacts[] = new Contact($row);
        }
        return $contacts;
    }
}