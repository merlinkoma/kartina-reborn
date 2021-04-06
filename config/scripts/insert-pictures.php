<?php

require __DIR__.'/../../config/database.php'; 

$pictures = [['Nydalasjön aurora','2015-01-01',1,1,1,2],
['Frozen clothespin','2015-01-01',1,1,1,1],
['Miroirs de la Défense','2013-01-01',1,1,1,2],
['Nydalahöjden','2014-01-01',1,1,1,2],
['Dykförbud','2014-01-01',1,1,1,3],
['Casino Barrière','2015-01-01',1,1,1,1],
['Ballons Migrateurs','2013-01-01',1,1,1,2],
['Umeå gamla bron','2015-01-01',1,1,1,2],
['Raismes','2013-01-01',1,1,1,3],
['Vieux Rex','2013-01-01',1,1,1,2],
['Gamla Uppsala','2015-01-01',1,1,1,2],
['Månskenviken','2015-01-01',1,1,1,2],
['Entrelacement','2013-01-01',2,1,1,1],
['Gayant 1','2013-01-01',2,1,1,1],
['Gayant 2','2013-01-01',2,1,1,3],
['Histoire','2013-01-01',2,1,1,3],
['Ouverture 1','2013-01-01',2,1,1,2],
['Ouverture 2','2013-01-01',2,1,1,1],
['Ouverture 3','2013-01-01',2,1,1,2],
['Ouverture 4','2013-01-01',2,1,1,2],
['Ouverture 5','2013-01-01',2,1,1,2],
['Parapente 1','2013-01-01',2,1,1,2],
['Parapente 2','2013-01-01',2,1,1,1],
['Scène de rue 1','2013-01-01',2,1,1,2],
['Scène de rue 2','2013-01-01',2,1,1,1],
['Ault','2021-01-01',3,1,1,2],
['Couché de soleil','2021-01-01',3,1,1,2],
['Horizon','2021-01-01',3,1,1,2],
['Lettonie','2021-01-01',3,1,1,2],
['Lumière','2021-01-01',3,1,1,2],
['Marée basse','2021-01-01',3,1,1,2],
['Omaha Beach 1','2021-01-01',3,1,1,2],
['Omaha Beach 2','2021-01-01',3,1,1,2],
['Réunion','2021-01-01',3,1,1,2],
['Vent','2021-01-01',3,1,1,2],
['Ventspils','2021-01-01',3,1,1,2],
['Avec le temps va…','2021-01-01',4,1,1,2],
['Couple à poils','2021-01-01',4,1,1,2],
['Détresse','2021-01-01',4,1,1,3],
['Divine lumière','2021-01-01',4,1,1,2],
['Eclatante','2021-01-01',4,1,1,1],
['Fait comme l oiseau','2021-01-01',4,1,1,2],
['Génération','2021-01-01',4,1,1,1],
['Ivresse des profondeurs','2021-01-01',4,1,1,2],
['Les Géants de la route','2021-01-01',4,1,1,2],
['Matin calme','2021-01-01',4,1,1,1],
['Never forget…','2021-01-01',4,1,1,3],
['Notre-Dame','2021-01-01',4,1,1,1],
['On the road again','2021-01-01',4,1,1,2],
['Parade','2021-01-01',4,1,1,3],
['Plein champ','2021-01-01',4,1,1,2],
['Green trees beside river','2020-12-01',5,1,1,1],
['Green plants and trees','2020-07-01',5,1,1,2],
['Tranquil sea washing sandy beach on clear day','2020-06-01',5,1,1,2],
['Body of Water Under Cloudy Sky','2020-06-01',5,1,1,2],
['Sea','2020-06-01',5,1,1,2],
['Forest','2020-06-01',5,1,1,2],
['Couple Sitting On Wooden Bench Beneath Tree','2020-02-01',5,1,1,1],
['Photo of Island Under Cloudy Sky','2020-01-01',5,1,1,1],
['morning','2020-01-01',5,1,1,1],
['Two Woman Standing on Suspension in Grayscale Photography','2018-11-01',5,1,1,1],
['Street','2018-11-01',5,1,1,1],
['Grayscale Bridge','2018-11-01',5,1,1,2],
['Person Standing Near Tree','2020-01-01',5,1,1,1],
['Aged paved tunnel with windows near sea','2020-06-01',5,1,1,2],
['Landscape','2020-01-01',5,1,1,2],
['Forest 1','2021-01-01',6,1,1,1],
['Forest 2','2021-01-01',6,1,1,1],
['Forest 3','2021-01-01',6,1,1,1],
['Forest 4','2021-01-01',6,1,1,1],
['Forest 5','2021-01-01',6,1,1,1],
['Forest 6','2021-01-01',6,1,1,1],
['Forest 7','2021-01-01',6,1,1,1],
['Forest 8','2021-01-01',6,1,1,2],
['Mountain 1','2021-01-01',6,1,1,1],
['Mountain 2','2021-01-01',6,1,1,1],
['Castle','2021-01-01',6,1,1,1],
['A bridge to the sun','2017-01-01',7,1,1,2],
['David and Goliath','2017-01-01',7,1,1,2],
['Miami at its Minimum','2017-01-01',7,1,1,4],
['Morning Contemplation','2017-01-01',7,1,1,4],
['Santa Cruz','2017-01-01',7,1,1,2],
['The Porto','2017-01-01',7,1,1,2],
['Maison brune avec plantes vertes','2018-09-01',8,1,1,2],
['Photographie de mise au point selective d une plante avec rosée','2018-09-01',8,1,1,2],
['Maison en beton gris près des arbres verts','2018-04-01',8,1,1,2],
['Immeuble de grande hauteur en verre transparent','2017-10-01',8,1,1,2],
['Bateau blanc avec voile sur plan d eau','2017-03-01',8,1,1,2],
['Low angle view de l horloge à la gare','2017-01-01',8,1,1,2],
['Road','2017-01-01',8,1,1,2],
['Route asphaltée noire','2017-01-01',8,1,1,2],
['Route vide à cote de Boulder','2017-01-01',8,1,1,2],
['Vue du chateau en ville','2016-01-01',8,1,1,2],
['Bâtiment éclairé près du plan d eau pendant la nuit','2016-09-01',8,1,1,2],
['Pins verts couverts de brouillard sous le ciel blanc pendant la journée','2016-09-01',8,1,1,2],
['Photographie aérienne de la ville avec rivière','2016-09-01',8,1,1,2],
['Arbre à feuilles vertes pendant le temps de brouillard','2016-09-01',8,1,1,2],
['Dumbo Street and Bridge Brooklyn','2015-08-01',9,1,1,2],
['Brooklyn','2015-08-01',9,1,1,2],
['London','2016-06-01',9,1,1,2],
['London 2','2016-07-01',9,1,1,2],
['Steel bridge below','2015-08-01',9,1,1,2],
['Flatiron building looking up','2015-08-01',9,1,1,1],
['Zebra','2021-03-01',10,1,1,3],
['Yellow and black','2021-03-01',10,1,1,3],
['Setan','2021-03-01',10,1,1,2],
['Building','2021-03-01',10,1,1,2],
['Building 2','2021-03-01',10,1,1,1],
['Building 3','2021-03-01',10,1,1,1],
['Building 4','2021-03-01',10,1,1,1],
['Gym','2021-02-01',10,1,1,2],
['Stairs','2021-02-01',10,1,1,3],
['Stairs 2','2021-02-01',10,1,1,1],
['Colours','2021-02-01',10,1,1,3],
['Zebra 2','2021-02-01',10,1,1,1],
['Temple','2021-02-01',10,1,1,2],
['Library','2021-02-01',10,1,1,3],
['Zebra 3','2021-02-01',10,1,1,1],
['Building 5','2021-03-01',10,1,1,1],
['Cathédrale 1','2021-02-03',11,40,10,1],
['Cathédrale 2','2021-02-15',11,50,20,1],
['Cathédrale 3','2021-03-23',11,30,10,1],
['Cimetière','2021-02-13',11,40,15,2],
['Coeur','2020-09-25',11,50,15,1],
['Eglise','2021-03-27',11,50,15,1],
['Fabrique','2020-12-20',11,55,20,2],
['Fleur','2021-03-23',11,40,20,2],
['Gargouilles de cathédrale','2021-03-02',11,50,100,2],
['Nivernais','2020-11-15',11,40,40,2],
['Palais Ducal','2020-11-15',11,45,30,1],
['Passy 1','2021-03-24',11,50,20,2],
['Passy','2021-03-24',11,50,20,2],
['Paysage','2021-01-17',11,70,10,1],
['Retable','2021-01-23',11,80,15,1],
['Statue 3','2020-12-29',11,30,150,1],
['Statue 2','2021-03-24',11,75,70,1],
['Statue','2021-02-13',11,50,50,2]];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE picture');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($pictures as $picture){

    $cover = str_replace('è', 'e', $picture[0]);
    $cover = str_replace('é', 'e', $cover);
    $cover = str_replace('å', 'a', $cover);
    $cover = str_replace('à', 'a', $cover);
    $cover = str_replace('â', 'a', $cover);
    $cover = str_replace('ö', 'o', $cover);
    $cover = str_replace("'", '-', $cover);
    $cover = str_replace(' ', '-', $cover);
    $cover = str_replace('…', 'x', $cover);
    $cover = strtolower($cover).'.jpg';

    $db->query("INSERT INTO picture (title, creation_date, user_iduser, price, quantity, orientation_idorientation, cover) VALUES ('$picture[0]', '$picture[1]', $picture[2], $picture[3], $picture[4], $picture[5], '$cover')");
}