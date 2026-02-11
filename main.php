<?php
require_once 'config/config.php';
require_once 'DBConnect.php';
require_once 'ContactManager.php';
require_once 'Contact.php';
$dbo = new DBConnect()->getPDO();
$contactManager = new ContactManager($dbo);

while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, exit) :");
    switch ($line){
        case "list":
            echo "affichage de la liste" . PHP_EOL;
           
            $contacts = $contactManager->findAll();
           
            foreach ($contacts as $contact) {
                echo($contact);
            }
            break;
        case "exit":
            echo "au revoir" . PHP_EOL;
            exit(0);
        default:
            echo "commande inconnue - consultez l'aide: help + entrée" . PHP_EOL;
    }
}
