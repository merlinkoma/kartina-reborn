<?php
    require __DIR__.'/../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="./assets/style/body.css">   
</head>

<body>

<div class="container-header">
    <header>
        <div>
            <!-- Titre -->
            <div class="titre">
                <h1><a href="./index.php">KARTINA</a></h1>
                <p>L'Art au bout des doigts.</p>
            </div>

            <!-- Barre de recherche -->
            <div class="barrerecherche">
                <form action="get">
                    <input type="search" name="recherche" id="cherche" placeholder="Rechercher sur Kartina">
                </form>
            </div>

            <!-- Icônes top right -->
            <div class="info">
                <div>
                    <a href="./Aide.php">Aide</a>
                </div>

                <div>
                    <form action="">
                        <img src="./assets/icons/langue.png" alt="langue">
                        <select name="langue" id="">
                            <option value="france">FR</option>
                            <option value="anglais">EN</option>
                        </select>
                    </form>
                </div>

                <div>
                    <a href="./interface-useraccount.php"><img src="./assets/icons/user.png" alt="user"> Sign-in</a>
                </div>

                <div>
                    <a href="./panier.php"><img src="./assets/icons/shopping-cart.png" alt="panier">
                        Panier</a>
                </div>
            </div>
        </div>

        <div id="trait"></div>
        <div id="trait"></div>

        <!-- Navigation dans le site -->
        <div class="navigation">
            <ul>
                <li><a href="lien vers les photo">Photographies</a></li>
                <li><a href="liens vers les nouveautés">Nouveautés</a></li>
                <li><a href="liens vers les artistes">Artistes</a></li>
                <li><a href="liens vers les derniers exemplaires">Derniers exemplaires</a></li>
            </ul>
        </div>
    </header>
</div>
