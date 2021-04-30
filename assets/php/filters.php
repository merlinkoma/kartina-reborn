<?php

$db = new PDO('mysql:host=localhost;dbname=kartina;', 'root', '', [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$orientations = $_GET['orientation'] ?? null;
$long = count($orientations);
// 1 normalement inutile mais sécurité en +
$page = $_GET['page'] ?? 1;
$where = '';
$limit = 24;
$debut = ($page - 1)*$limit;

$datas = [];

foreach ($orientations as $index => $orientation) {
    if ($index == ($long - 1)) {
        $where .= $orientation;
    } else {
        $where .= $orientation . ' OR orientation_idorientation = ';
    }
}

$query = $db->query("SELECT * FROM picture WHERE orientation_idorientation = $where LIMIT $limit OFFSET $debut");
$datas['responses'] = $query->fetchAll();

$query = $db->query("SELECT count(idpicture) FROM picture WHERE orientation_idorientation = $where");
$datas['quantity'] = $query->fetchColumn();
//fetch() -> renvoie un objet, difficile à utiliser
//fetchColumn() -> renvoie un entier


header('Content-Type: application/json');

echo json_encode($datas);
