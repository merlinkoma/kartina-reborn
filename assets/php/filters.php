<?php

$db = new PDO('mysql:host=localhost;dbname=kartina;', 'root', '', [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$orientations = $_GET['orientation'] ?? [];
$long = count($orientations);
$theme = $_GET['theme'] ?? null;
if($theme == 1){
    $theme = null;
}
$theme = strtolower($theme);
$price = $_GET['price'] ?? '1';
$creation_date = $_GET['creation_date'] ?? '';

$page = $_GET['page'] ?? 1;
$limit = 24;
$debut = ($page - 1) * $limit;
$and = false;

$tags = [];
$datas = [];

$where = '';
$order = '';

if ($orientations !== []) {
    $where = " WHERE picture.orientation_idorientation = ";
    foreach ($orientations as $index => $orientation) {
        if($orientation == 1){
            $tags['orientation'][] = 'Portrait';
        }elseif($orientation == 2){
            $tags['orientation'][] = 'Paysage';
        }elseif($orientation == 3){
            $tags['orientation'][] = 'Carré';
        }elseif($orientation == 4){
            $tags['orientation'][] = 'Panoramique';
        }

        if ($index == ($long - 1)) {
            $where .= $orientation . ' ';
        } else {
            $where .= " $orientation  OR picture.orientation_idorientation = ";
        }
    }
    $and = true;
}

if (!empty($theme)) {
    $tags['theme'] = ucfirst($theme);
    if ($and) {
        $where .= " AND theme.theme_name = '$theme' ";
    } else {
        $where .= " WHERE theme.theme_name = '$theme' ";
        $and = true;
    }
}

if (!empty($price)) {
    if ($and) {
        switch ($price) {
            case '1':
                $tags['price'] = 'Tous les prix';
                $where .= " AND picture.price > 0 ";
                break;
            case '50':
                $tags['price'] = 'Moins de 50€';
                $where .= " AND picture.price <= 50 ";
                break;
            case '50100':
                $tags['price'] = 'De 50 à 100€';
                $where .= " AND picture.price >= 50 AND picture.price <= 100 ";
                break;
            case '100200':
                $tags['price'] = 'De 100 à 200€';
                $where .= " AND picture.price >= 100 AND picture.price <= 200 ";
                break;
            case '200500':
                $tags['price'] = 'De 200 à 500€';
                $where .= " AND picture.price >= 200 AND picture.price <= 500 ";
                break;
            case '500':
                $tags['price'] = 'Plus de 500€';
                $where .= " AND picture.price > 500 ";
                break;
        }
    } else {
        $and = true;
        switch ($price) {
            case '1':
                $tags['price'] = 'Tous les prix';
                $where .= " WHERE picture.price > 0 ";
                break;
            case '50':
                $tags['price'] = 'Moins de 50€';
                $where .= " WHERE picture.price <= 50 ";
                break;
            case '50100':
                $tags['price'] = 'De 50 à 100€';
                $where .= " WHERE picture.price >= 50 AND picture.price <= 100 ";
                break;
            case '100200':
                $tags['price'] = 'De 100 à 200€';
                $where .= " WHERE picture.price >= 100 AND picture.price <= 200 ";
                break;
            case '200500':
                $tags['price'] = 'De 200 à 500€';
                $where .= " WHERE picture.price >= 200 AND picture.price <= 500 ";
                break;
            case '500':
                $tags['price'] = 'Plus de 500€';
                $where .= " WHERE picture.price > 500 ";
                break;
        }
    }
}

if (!empty($creation_date)) {
    $tags['creation_date'] = 'Nouveautés';
    $order .= " ORDER BY picture.creation_date DESC ";
}

/*var_dump("SELECT * FROM picture 
INNER JOIN theme_has_picture ON picture.idpicture = theme_has_picture.picture_idpicture 
INNER JOIN theme ON theme_has_picture.theme_idtheme = theme.idtheme  
$where
LIMIT $limit OFFSET $debut");*/

//Requête principale
$query = $db->query("SELECT * FROM picture 
    INNER JOIN theme_has_picture ON picture.idpicture = theme_has_picture.picture_idpicture 
    INNER JOIN theme ON theme_has_picture.theme_idtheme = theme.idtheme  
    $where
    GROUP BY picture.idpicture 
    $order
    LIMIT $limit OFFSET $debut");
$datas['responses'] = $query->fetchAll();

//Requête pour la pagination
$query = $db->query("SELECT * FROM picture 
    INNER JOIN theme_has_picture ON picture.idpicture = theme_has_picture.picture_idpicture 
    INNER JOIN theme ON theme_has_picture.theme_idtheme = theme.idtheme 
    $where 
    GROUP BY picture.idpicture ");
 $quantity = $query->fetchAll();
 $datas['quantity'] = count($quantity);
//fetch() -> renvoie un objet, difficile à utiliser
//fetchColumn() -> renvoie un entier
$datas['tags'] = $tags;

header('Content-Type: application/json');

echo json_encode($datas);
