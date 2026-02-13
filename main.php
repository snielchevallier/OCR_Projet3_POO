<?php
require_once 'config/config.php';
spl_autoload_register();
use App\Command;

$command = new Command();
while (true) {
    $line = readline("Entrez votre commande (list, detail, create, update, delete, exit) :");
    //detection de la commande et de ses arguments
    if ($line==="list"){
        $command->list();
    } elseif (preg_match("/^detail\s+(\d+)$/", $line, $matches)){
        $command->detail(intval($matches[1]));
    } elseif (preg_match("/^delete\s+(\d+)$/", $line, $matches)){
        $command->delete(intval($matches[1]));
    }elseif (preg_match('/^create\s+([^,]+),([^,]+),([^,]+)$/', $line, $matches)){
        $command->create($matches);
    } elseif (preg_match('/^update\s+(\d+),([^,]+),([^,]+),([^,]+)$/', $line, $matches)){
        $command->update($matches);
    } elseif ($line==="exit"){
        $command->exit();
    }elseif ($line==="help"){
        $command->help();
    } else {
        echo "commande inconnue - consultez l'aide: help + entrée" . PHP_EOL;
    }
}
