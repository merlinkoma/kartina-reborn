<?php

$db = new PDO('mysql:host=localhost;dbname=kartina; charset=UTF8', 'root', '', [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$orientations = $_GET['orientation'] ?? null;
$long = count($orientations);
$where = '';

foreach ($orientations as $index => $orientation) {
    if ($index == ($long - 1)) {
        $where .= $orientation;
    } else {
        $where .= $orientation . ' OR orientation_idorientation = ';
    }
}

$query = $db->query("SELECT * FROM picture WHERE orientation_idorientation = $where ORDER BY RAND() LIMIT 24");
$responses = $query->fetchAll();

header('Content-Type: application/json');

echo json_encode($responses);
