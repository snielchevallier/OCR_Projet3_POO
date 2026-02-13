<?php
declare(strict_types=1);
namespace App;
use App\ContactManager;

Class Command{

    private $contactManager;

    public function __construct(){
        //initialisation de la classe Command
        $this->contactManager = new ContactManager();
    } 

    public function list(){
        echo "affichage de la liste" . PHP_EOL;
        $contacts = $this->contactManager->findAll();
        foreach ($contacts as $contact) {
            echo($contact);
        }
    }

    public function detail(int $id){ 
        echo "affichage du contact avec l'id : " . $id . PHP_EOL; 
        $contacts = $this->contactManager->findById($id); 
        if ($contacts) {
            echo($contacts);
        } else {
            echo "contact non trouvé" . PHP_EOL;
        }
        
    }

    public function create(array $data){ 
        echo "création d'un contact" . PHP_EOL; 
        //validation des données
        if (count($data) !== 4 || empty($data[1]) || empty($data[2]) || empty($data[3])|| !filter_var($data[2], FILTER_VALIDATE_EMAIL)|| !preg_match('/^\+?[0-9]{7,15}$/', $data[3])) {
            echo "données invalides - format attendu : create {nom},{email},{téléphone}" . PHP_EOL;
            return;
        }else{
            $contact = new Contact([
                'name' => $data[1],
                'email' => $data[2],
                'phone_number' => $data[3]
            ]);
            $this->contactManager->add($contact); 
        }
        
    } 

    public function update(array $data){ 
        echo "mise à jour d'un contact" . PHP_EOL;
        //validation des données
         if (count($data) !== 5 || empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4]) || !filter_var($data[3], FILTER_VALIDATE_EMAIL)|| !preg_match('/^\+?[0-9]{7,15}$/', $data[4])) {
            echo "données invalides - format attendu : update {id},{nom},{email},{téléphone}" . PHP_EOL;
            return;
        }else{
            $contact = $this->contactManager->findById(intval($data[1]));
            if (!$contact) {
                echo "contact non trouvé" . PHP_EOL;
                return;
            }else{
                $contact->setName($data[2]);
                $contact->setEmail($data[3]);
                $contact->setPhone($data[4]);
                $this->contactManager->update($contact); 
            }
        }
    }

    public function delete(int $id){ 
        echo "suppression du contact avec l'id : " . $id . PHP_EOL; 
        $contacts = $this->contactManager->deleteById($id);
        if ($contacts) {
            echo "contact supprimé" . PHP_EOL;
        } else {
            echo "contact non trouvé" . PHP_EOL;
        }
        
    }

    public function exit(){
        echo "au revoir" . PHP_EOL;
        exit(0);
    }

    public function help(){
        echo "Liste des commandes disponibles:" . PHP_EOL;
        echo "list - Affiche la liste de tous les contacts" . PHP_EOL;
        echo "detail {id} - Affiche les détails du contact avec l'id spécifié" . PHP_EOL;
        echo "create {nom},{email},{téléphone} - Crée un nouveau contact" . PHP_EOL;
        echo "update {id},{nom},{email},{téléphone} - Met à jour un contact existant" . PHP_EOL;
        echo "delete {id} - Supprime le contact avec l'id spécifié" . PHP_EOL;
        echo "exit - Quitte l'application" . PHP_EOL;
    }

}