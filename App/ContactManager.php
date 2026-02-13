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
        try{
            $stmt = $this->pdo->query('SELECT * FROM contact');
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $contacts = [];
            foreach ($results as $row) {
                $contacts[] = new Contact($row);
            }
            return $contacts;
        } catch (\PDOException $e) {
            die('Erreur lors de la récupération des contacts : ' . $e->getMessage());
        }
    }

    //fonction pour trouver un contact par son id
    public function findById(int $id){
        try{
            $stmt = $this->pdo->prepare('SELECT * FROM contact WHERE id = :id');
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                return new Contact($result);
            }
            return null;
        } catch (\PDOException $e) {
            die('Erreur lors de la récupération du contact : ' . $e->getMessage());
        }
    }

    //fonction pour ajouter un contact
    public function add(Contact $contact){
        try{
            $stmt = $this->pdo->prepare('INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone)');
            $name = $contact->getName();
            $email = $contact->getEmail();
            $phone = $contact->getPhone();
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            return $this->findById((int)$this->pdo->lastInsertId());
        } catch (\PDOException $e) {
            die('Erreur lors de l\'ajout du contact : ' . $e->getMessage());
        }
    }

    //fonction pour mettre à jour un contact
    public function update(Contact $contact){
        try{
            $stmt = $this->pdo->prepare('UPDATE contact SET name = :name, email = :email, phone_number = :phone WHERE id = :id');
            $name = $contact->getName();
            $email = $contact->getEmail();
            $phone = $contact->getPhone();
            $id = $contact->getId();
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $this->findById($contact->getId());
        } catch (\PDOException $e) {
            die('Erreur lors de la mise à jour du contact : ' . $e->getMessage());
        }
    }
    
    //fonction pour trouver un contact par son id
    public function deleteById(int $id){
        try{
            $stmt = $this->pdo->prepare('DELETE FROM contact WHERE id = :id');
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            die('Erreur lors de la suppression du contact : ' . $e->getMessage());
        }
    }
}