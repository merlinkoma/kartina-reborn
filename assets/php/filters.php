<?php

$db = new PDO('mysql:host=localhost;dbname=kartina; charset=UTF8', 'root', '', [
    
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$orientation = $_GET['orientation'];

$query = $db->query("SELECT * FROM picture WHERE orientation_idorientation = $orientation");
$responses = $query->fetchAll();

header('Content-Type: application/json');

echo json_encode($responses);
?>
