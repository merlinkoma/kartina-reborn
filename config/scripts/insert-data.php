<?php

//chemin pour la connexion à la BDD
require __DIR__.'/../../config/database.php'; 

//insersion des tables fixes
$orientations = ['portrait', 'paysage', 'carré', 'panoramique'];
$formats = [['classique', 1.3], ['grand', 2.6], ['géant', 4], ['collector', 10]];
$finitions = [['passe-partout noir', 1], ['tirage papier', 1], ['passe-partout blanc', 1.4], ['aluminium', 2.6], ['acrylique', 3.35]];
$cadres = [['sans cadre', 1], ['aluminium noir', 1], ['aluminium blanc', 1], ['acajou', 1], ['aluminium brossé', 1], ['satin noir', 1.45], ['satin blanc', 1.45], ['noyer', 1.45], ['chêne', 1.45]];

$artists = [['Mélissa', 'Ameye', 'Merlink', 'CC'], ['Maïlys', 'Edard', 'Maïlys', 'CC'], ['Ambre', 'Arrivé', 'Ambre Arv', 'CC'], ['Vincent', 'Schricke', 'Vincent Schricke', 'CC'], ['Cátia', 'Matos', 'Cátia Matos', 'pexels'], ['Eberhard', 'Grossgasteiger', 'Eberhard Grossgasteiger', 'unsplash'], ['Everaldo', 'Coelho', 'Everaldo Coelho', 'unsplash'], ['Lumen', 'Lumen', 'Lum3n', 'unsplash'], ['Valor', 'Kopeny', 'Valor Kopeny', 'unsplash'], ['Yi', 'Wu', 'Wu Yi', 'pexels'], ['Louis', 'Ville', 'Louis Ville', 'CC'], ['Romaric', 'Thirard', 'Romaric Thirard', 'CC']];

$users = [['Lucas', 'Jules', 'azerty', 'admin', 'CC', 'lucasju@hotmail.fr']];

//vidage de la table, désactivation des clefs étrangères, truncate pour remettre les ID à 0, réactivation des clefs étrangères.
$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE orientation');
$db->query('TRUNCATE format');
$db->query('TRUNCATE finition');
$db->query('TRUNCATE cadre');
$db->query('TRUNCATE user');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($orientations as $orientation){
    $db->query("INSERT INTO orientation (orientation_name) VALUES ('$orientation')");
    echo '<br/>'.$orientation;
}

foreach ($formats as $format){
    $db->query("INSERT INTO format (format_name, cost) VALUES ('$format[0]', $format[1])");
    echo '<br/>'.$format[0].' -> '.$format[1];
}

foreach ($finitions as $finition){
    $db->query("INSERT INTO finition (finition_name, cost) VALUES ('$finition[0]', $finition[1])");
    echo '<br/>'.$finition[0].' -> '.$finition[1];
}

foreach ($cadres as $cadre){
    $db->query("INSERT INTO cadre (cadre_name, cost) VALUES ('$cadre[0]', $cadre[1])");
    echo '<br/>'.$cadre[0].' -> '.$cadre[1];
}

foreach ($artists as $artist){
    $db->query("INSERT INTO user (firstname, lastname, artist_name, role, licence, password) VALUES ('$artist[0]', '$artist[1]' ,'$artist[2]', 'artist', '$artist[3]', '".password_hash('azerty', PASSWORD_DEFAULT)."')");
}

foreach($users as $user){
    $passwordhash = password_hash($user[2], PASSWORD_DEFAULT);
    $db->query("INSERT INTO user (firstname, lastname, password, role, licence, email) VALUES ('$user[0]', '$user[1]', '$passwordhash', '$user[3]', '$user[4]', '$user[5]')");
}




