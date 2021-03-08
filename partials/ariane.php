<?php

$ariane = '<div class="ariane"><a href="./index.php">Accueil</a>';
if ($title == 'accueil'){
    echo $ariane.'<i class="fas fa-caret-right"></i></div>';
}
if ($title == 'artiste'){
    echo $ariane.'<i class="fas fa-caret-right"></i><a href="./page-artiste.php">'.$title.'</a></div>';
}

//Accueil -> <div class="ariane"><a href="./index.php">Accueil</a></div>
//Page artiste -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./page-artiste.php">$title</a></div> MODIFIER LE $title PAR LE NOM DE L'ARTISTE APRES LA CREATION DE LA BDD
//Pade d'aide -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./aide.php">$title</a></div>

//Connexion -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./interface-useraccount.php">$title</a></div>
//Création du compte -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span>...A COMPLETER
//Comptes -> <div class="ariane"><a href="./index.php">Accueil</a><span> -> </span><a href="./administration-useraccount.php">Mon compte</a></div>
//Administration -> <div class="ariane"><a href="./index.php">Accueil</a><span> -> ...A COMPLETER

//Parcours de recherche -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./all-photographies.php">Photographies</a></div>
//Pour la recherche filtrée, ajouter des param. dans l'URL, récupérés avec $_GET.
//Panier -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./panier.php">$title</a></div>
//Payement -> <div class="ariane"><a href="./index.php">Accueil</a><span> + </span><a href="./panier.php">$title</a></div><span> + </span><a href="./#.php">Payement</a></div> -> + confirmation de payement.
?>