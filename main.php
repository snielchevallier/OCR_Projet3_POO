<?php
require_once 'config/config.php';
spl_autoload_register();
use App\Command;


while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, exit) :");
    switch ($line){
        case "list":
            Command::list();
            break;
        case "exit":
            echo "au revoir" . PHP_EOL;
            exit(0);
        default:
            echo "commande inconnue - consultez l'aide: help + entrée" . PHP_EOL;
    }
}
