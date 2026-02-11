<?php

while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, exit) :");
    switch ($line){
        case "list":
            echo "affichage de la liste" . PHP_EOL;
            break;
        case "exit":
            echo "au revoir" . PHP_EOL;
            exit(0);
        default:
            echo "commande inconnue - consultez l'aide: aide + entrée" . PHP_EOL;
    }
}