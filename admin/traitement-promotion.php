<?php
$title = 'Traitement';

$path = './../';
$paths = './';

require_once './../partials/header.php';

$id = $_GET['id'] ?? 0;

$query = $db->prepare('SELECT * FROM user WHERE iduser = :iduser');
$query->execute(['iduser' => $id]);
$user = $query->fetch();

if ($user) {
    $newRole = $user['role'] === 'user' ? 'artist' : 'user';

    $query = $db->prepare('UPDATE user SET  
                                            -- artist_name = :artist_name,
                                            role = :role,
                                            request = :request WHERE iduser = :iduser');
    $query->execute([
        ':iduser' => $id,
        // ':artist_name' => $surname,
        ':role' => $newRole,
        ':request' => 0,
    ]);
}

header ('Location: activation-promotion.php?promotion');
?>