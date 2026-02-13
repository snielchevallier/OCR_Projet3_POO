## Outil de gestion de Contacts en CLI

## Pour utiliser ce projet : 

- Commencer par cloner le projet. 
- installez le projet chez vous, dans un dossier exécuté par un serveur local (type MAMP, WAMP, LAMP, etc...)
- Une fois installé chez vous, créez un base de données vide
- Importez le fichier ocr_projet3_poo.sql dans votre base de données.
- dupliquez ou renommez le fichier config/_config.php en config/config.php
- dans ce fichier, saisissez vos informations de connection à la bdd

## Détail des commandes

- list: Affiche la liste de tous les contacts
- detail {id} - Affiche les détails du contact avec l'id spécifié
- create {nom},{email},{téléphone} - Crée un nouveau contact
- update {id},{nom},{email},{téléphone} - Met à jour un contact existant
- delete {id} - Supprime le contact avec l'id spécifié
- exit - Quitte l'application