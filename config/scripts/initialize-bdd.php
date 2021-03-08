<?php //NE PAS ACTIVER CE SCRIPT 

//connexion à la BDD
require __DIR__.'#'; // -> remplacer le path

//tableau des éléments que l'on insère
$table = ['1', '2', '3']; // -> remplacer les données

//vidage de la table, désactivation des clefs étrangères, truncate pour remettre les ID à 0, réactivation des clefs étrangères.
$db->query('SET FOREIGN_KEY_CHECKS = 0'); // Nb. l'utilisation de $db sous entend qu'on a bien défini la variable dans le fichier de connexion à la BDD
$db->query('TRUNCATE #'); // -> remplacer par le nom de la table
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($table as $item){
    $db->query("INSERT INTO x VALUES ('$item')"); //INTO -> nom de la table
}
