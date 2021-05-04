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
    [50, 6],
    [51, 2],
    [51, 9],
    [52, 2],
    [52, 10],
    [54, 2],
    [54, 3],
    [55, 2],
    [55, 3],
    [56, 2],
    [56, 3],
    [57, 2],
    [57, 10],
    [58, 4],
    [59, 2],
    [59, 3],
    [60, 2],
    [60, 3],
    [61, 1],
    [61, 4],
    [61, 9],
    [62, 1],
    [62, 4],
    [63, 1],
    [63, 4],
    [64, 2],
    [64, 4],
    [65, 4],
    [66, 2],
    [66, 3],
    [66, 10],
    [67, 2],
    [67, 10],
    [68, 2],
    [68, 10],
    [69, 2],
    [69, 10],
    [70, 2],
    [70, 10],
    [71, 2],
    [71, 10],
    [72, 2],
    [72, 10],
    [73, 2],
    [73, 10],
    [74, 2],
    [74, 10],
    [75, 2],
    [75, 10],
    [76, 2],
    [76, 10],
    [77, 2],
    [77, 9],
    [78, 2],
    [78, 9],
    [79, 2],
    [79, 3],
    [79, 9],
    [80, 2],
    [80, 3],
    [80, 4],
    [81, 2],
    [81, 4],
    [81, 9],
    [82, 2],
    [82, 3],
    [82, 9],
    [83, 2],
    [83, 3],
    [83, 4],
    [84, 4],
    [85, 6],
    [86, 4],
    [87, 4],
    [88, 2],
    [88, 3],
    [89, 4],
    [89, 9],
    [90, 4],
    [91, 2],
    [92, 2],
    [93, 2],
    [93, 9],
    [94, 2],
    [94, 4],
    [95, 2],
    [95, 10],
    [96, 2],
    [96, 4],
    [97, 2],
    [97, 10],
    [98, 2],
    [98, 4],
    [98, 9],
    [99, 2],
    [99, 4],
    [99, 9],
    [100, 2],
    [100, 4],
    [100, 9],
    [101, 2],
    [101, 4],
    [101, 9],
    [102, 4],
    [102, 9],
    [103, 4],
    [103, 9],
    [104, 1],
    [104, 4],
    [105, 4],
    [106, 1],
    [106, 4],
    [106, 7],
    [107, 1],
    [107, 4],
    [108, 1],
    [108, 4],
    [109, 1],
    [109, 4],
    [110, 1],
    [110, 4],
    [111, 7],
    [112, 4],
    [112, 9],
    [113, 4],
    [113, 9],
    [114, 4],
    [114, 9],
    [115, 4],
    [116, 4],
    [116, 9],
    [117, 9],
    [118, 1],
    [118, 4],
    [119, 1],
    [119, 4],
    [120, 9],
    [121, 9],
    [122, 9],
    [123, 2],
    [123, 9],
    [124, 9],
    [125, 9],
    [126, 1],
    [126, 4],
    [126, 9],
    [127, 6],
    [128, 1],
    [128, 9],
    [129, 2],
    [130, 2],
    [130, 9],
    [131, 2],
    [131, 9],
    [132, 2],
    [132, 6],
    [133, 2],
    [134, 9],
    [135, 9],
    [136, 9],
    [137, 9],
    [139, 1],
    [140, 2],
    [141, 2],
    [141, 5],
    [142, 5],
    [143, 2],
    [143, 3],
    [144, 2],
    [145, 1],
    [145, 5],
    [146, 2],
    [146, 5],
    [147, 2],
    [147, 3],
    [148, 1],
    [148, 5],
    [149, 1],
    [149, 5],
    [150, 1],
    [150, 5],
    [151, 1],
    [151, 5],
    [152, 2],
    [152, 5],
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
