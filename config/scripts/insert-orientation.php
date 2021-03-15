<?php

require __DIR__.'/../../config/database.php';

$orientations = ['portrait', 'paysage', 'carré', 'panoramique'];
$formats = [['classique', 1.3], ['grand', 2.6], ['géant', 4], ['collector', 10]];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE orientation');
$db->query('TRUNCATE format');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($orientations as $orientation){
    $db->query("INSERT INTO orientation (orientation_name) VALUES ('$orientation')");
    echo '<br/>'.$orientation;
}
foreach ($formats as $format){
    $db->query("INSERT INTO format (format_name, cost) VALUES ('$format[0]', $format[1])");
    echo '<br/>'.$format[0].' -> '.$format[1];
}

// INSERT INTO user (firstname, surname, artist_name) VALUES ('Maïlys', 'Edard', 'Maïlys');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Ambre', 'Arrivé', 'Ambre Arv');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Vincent', 'Schricke', 'Vincent Schricke');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Cátia', 'Matos', 'Cátia Matos');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Eberhard', 'Grossgasteiger', 'Eberhard Grossgasteiger');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Everaldo', 'Coelho', 'Everaldo Coelho');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Lumen', 'Lumen', 'Lum3n');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Valor', 'Kopeny', 'Valor Kopeny');
// INSERT INTO user (firstname, surname, artist_name) VALUES ('Yi', 'Wu', 'Wu Yi');

