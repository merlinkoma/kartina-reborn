<?php
$db = new PDO('mysql:host=localhost;dbname=kartina;port=3306', 'root', '', [
    
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

