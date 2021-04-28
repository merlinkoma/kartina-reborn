<?php

//chemin pour la connexion à la BDD
require __DIR__ . '/../../config/database.php';

//pour utiliser faker
require_once './../../vendor/autoload.php';

//insersion des tables fixes
$orientations = ['portrait', 'paysage', 'carré', 'panoramique'];
$formats = [['classique', 1.3], ['grand', 2.6], ['geant', 5.2], ['collector', 13]];
$finitions = [['pp_black', 1], ['paper_draw', 1], ['pp_white', 1.4], ['aluminium', 2.6], ['acrylic', 3.35]];
$cadres = [['none', 1], ['black_aluminium', 1], ['white_wood', 1], ['mahogany', 1], ['brushed_aluminium', 1], ['black_satin', 1.45], ['white_satin', 1.45], ['walnut', 1.45], ['oak', 1.45]];

$artists = [
    ['Mélissa', 'Ameye', 'Merlink', 'CC'],
    ['Maïlys', 'Edard', 'Maïlys', 'CC'],
    ['Ambre', 'Arrivé', 'Ambre Arv', 'CC'],
    ['Vincent', 'Schricke', 'Vincent Schricke', 'CC'],
    ['Cátia', 'Matos', 'Cátia Matos', 'pexels'],
    ['Eberhard', 'Grossgasteiger', 'Eberhard Grossgasteiger', 'unsplash'],
    ['Everaldo', 'Coelho', 'Everaldo Coelho', 'unsplash'],
    ['Lumen', 'Lumen', 'Lum3n', 'unsplash'],
    ['Valor', 'Kopeny', 'Valor Kopeny', 'unsplash'],
    ['Yi', 'Wu', 'Wu Yi', 'pexels'],
    ['Louis', 'Ville', 'Louis Ville', 'CC'],
    ['Romaric', 'Thirard', 'Romaric Thirard', 'CC']
];

$themes = ['Noir et Blanc', 'Paysage', 'Mer', 'Urbain', 'Animaux', 'Macro', 'Scènes de rue', 'Portrait', 'Architecture', 'Forêt'];

$users = [['Lucas', 'Jules', 'azerty', 'admin', 'lucasju@hotmail.fr']];

$picturesthemes = [
    [1, 2],
    [2, 4],
    [3, 4],
    [3, 9],
    [4, 1],
    [4, 4],
    [4, 2],
    [5, 2],
    [6, 4],
    [6, 9],
    [7, 2],
    [8, 1],
    [8, 4],
    [8, 9],
    [9, 2],
    [10, 4],
    [10, 9],
    [11, 1],
    [11, 2],
    [12, 1],
    [12, 2],
    [12, 10],
    [13, 6],
    [14, 7],
    [15, 7],
    [16, 4],
    [16, 9],
    [17, 9],
    [18, 9],
    [18, 8],
    [19, 4],
    [20, 9],
    [21, 9],
    [22, 2],
    [23, 2],
    [24, 7],
    [25, 7],
    [26, 2],
    [26, 3],
    [27, 2],
    [27, 3],
    [28, 2],
    [28, 3],
    [29, 2],
    [29, 3],
    [30, 2],
    [30, 3],
    [31, 2],
    [31, 3],
    [32, 2],
    [32, 3],
    [33, 2],
    [33, 3],
    [34, 2],
    [34, 3],
    [35, 2],
    [35, 3],
    [36, 2],
    [36, 3],
    [37, 2],
    [37, 9],
    [38, 5],
    [39, 8],
    [40, 8],
    [40, 1],
    [41, 6],
    [42, 5],
    [43, 1],
    [43, 8],
    [44, 8],
    [45, 7],
    [46, 2],
    [47, 8],
    [48, 9],
    [49, 4],
    [50, 6]
];

$networks = [
    [5, 'personal', 'https://www.catiamatos.com/'],
    [5, 'instagram', 'https://www.instagram.com/catia.matos/'],
    [6, 'instagram', 'https://www.instagram.com/eberhard_grossgasteiger/'],
    [7, 'personal', 'https://www.everaldo.com/'],
    [8, 'instagram', 'https://www.instagram.com/elum3a/'],
    [8, 'pexels', 'https://www.pexels.com/fr-fr/@lum3n-44775'],
    [9, 'personal', 'http://www.synthesisphoto.com/']
];

//vidage de la table, désactivation des clefs étrangères, truncate pour remettre les ID à 0, réactivation des clefs étrangères.
$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE orientation');
$db->query('TRUNCATE format');
$db->query('TRUNCATE finition');
$db->query('TRUNCATE cadre');
$db->query('TRUNCATE network');
$db->query('TRUNCATE user');
$db->query('TRUNCATE theme');
$db->query('TRUNCATE theme_has_picture');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($orientations as $orientation) {
    $db->query("INSERT INTO orientation (orientation_name) VALUES ('$orientation')");
    echo '<br/>' . $orientation;
}

foreach ($formats as $format) {
    $db->query("INSERT INTO kartina.format (format_name, cost) VALUES ('$format[0]', $format[1])");
    echo '<br/>' . $format[0] . ' -> ' . $format[1];
}

foreach ($finitions as $finition) {
    $db->query("INSERT INTO finition (finition_name, cost) VALUES ('$finition[0]', $finition[1])");
    echo '<br/>' . $finition[0] . ' -> ' . $finition[1];
}

foreach ($cadres as $cadre) {
    $db->query("INSERT INTO cadre (cadre_name, cost) VALUES ('$cadre[0]', $cadre[1])");
    echo '<br/>' . $cadre[0] . ' -> ' . $cadre[1];
}

foreach ($artists as $artist) {

    //Générer des fausses adresses mails 
    $faker = Faker\Factory::create();
    $useremail = $faker->email();

    $db->query("INSERT INTO user (firstname, lastname, artist_name, role, licence, password, email) VALUES ('$artist[0]', '$artist[1]' ,'$artist[2]', 'artist', '$artist[3]', '" . password_hash('azerty', PASSWORD_DEFAULT) . "', '$useremail')");
}

foreach ($users as $user) {
    $passwordhash = password_hash($user[2], PASSWORD_DEFAULT);
    $db->query("INSERT INTO user (firstname, lastname, password, licence, email) VALUES ('$user[0]', '$user[1]', '$passwordhash', '$user[3]', '$user[4]')");
}

foreach ($themes as $theme) {
    $db->query("INSERT INTO theme (theme_name) VALUES ('$theme')");
}

foreach ($picturesthemes as $picturestheme) {
    $db->query("INSERT INTO theme_has_picture (theme_idtheme, picture_idpicture) VALUES ($picturestheme[1], $picturestheme[0])");
}

foreach ($networks as $network) {
    $db->query("INSERT INTO network (user_iduser, network_name, network_path) VALUES ($network[0], '$network[1]', '$network[2]')");
}
