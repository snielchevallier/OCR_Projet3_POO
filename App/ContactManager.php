<?php
namespace App;

use App\DBConnect; 
use App\Contact;
class ContactManager extends DBConnect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DBConnect::getPDO();
    }

    //fonction pour trouver tous les contacts dans la base de données et les retourner sous forme d'objets Contact
    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM contact');
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $contacts = [];
        foreach ($results as $row) {
            $contacts[] = new Contact($row);
        }
        return $contacts;
    }
}