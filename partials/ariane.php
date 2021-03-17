<?php

$ariane = '<div class="ariane"><a href="./index.php">Accueil</a>';

if ($title == 'artiste'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./page-artiste.php">Artiste</a></div>'; //modifier ensuite "Artiste" avec le nom de l'artiste selon le choix du client
}

if($title == 'aide'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./aide.php">Aide</a></div>';
}

if($title == 'login'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./interface-useraccount.php">Se connecter</a></div>';
}

if($title == 'user account'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./administration-useraccount.php">Mon compte</a></div>';
}

if($title == 'filtres'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./all-photographies.php">Recherche des photographies</a></div>';
}
//Pour la recherche filtrée, ajouter des param. dans l'URL, récupérés avec $_GET.

if($title == 'panier'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./panier.php">Panier</a></div>';
}

if($title == 'parcours'){
    echo $ariane.' <img src="./assets/icons/caret_right" alt=">"> <a href="./panier.php">Choix des finitions</a></div>';
}

//Création du compte -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span>...A COMPLETER
//Administration -> <div class="ariane"><a href="./index.php">Accueil</a><span> -> ...A COMPLETER

//Payement -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./panier.php">$title</a></div><span> + </span><a href="./#.php">Payement</a></div> -> + confirmation de payement.
?>