<?php
declare(strict_types=1);
namespace App;
use App\ContactManager;

Class Command{
    static function list(){
        echo "affichage de la liste" . PHP_EOL;
           
        $contactManager = new ContactManager();
        $contacts = $contactManager->findAll();
           
        foreach ($contacts as $contact) {
            echo($contact);
        }
    }


}