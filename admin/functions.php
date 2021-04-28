<?php

function isAdmin()
{
    global $db;
    $admins = ['lucasju@hotmail.fr'];
    $user = $_SESSION['user'] ?? false;

    if ($user) {
        $_SESSION['user'] = $db
            ->query('SELECT * FROM user WHERE iduser = ' . $user['iduser'])
            ->fetch();
        $user = $_SESSION['user'];
    }

    if ($user && in_array($user['email'], $admins)) {
        return true;
    }

    if ($user && $user['role'] === 'admin') {
        return true;
    }

    return false;

}
