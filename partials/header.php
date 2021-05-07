<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../admin/functions.php';
session_start();

if (!isset($path)) {
    $path = './';
}

if (!isset($paths)) {
    $paths = './admin/';
}


require_once($path.'vendor/autoload.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $path; ?>assets/style/body.css">
</head>

<body>

    <div class="container-header">
        <header>
            <div>
                <!-- Titre -->
                <div class="titre">
                    <h1><a href="<?= $path; ?>index.php">KARTINA</a></h1>
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
                        <a href="<?= $path; ?>Aide.php">Aide</a>
                    </div>

                    <div>
                        <form action="">
                            <img src="<?= $path; ?>assets/icons/langue.png" alt="langue">
                            <select name="langue" id="">
                                <option value="france">FR</option>
                                <option value="anglais">EN</option>
                            </select>
                        </form>
                    </div>

                    <?php if (isset($_SESSION['user'])) { ?>
                        <div class="sign-in">
                            <a href="#"><?= $_SESSION['user']['email']; ?></a>
                            <div class="connexion">
                                <div>
                                    <a href="<?= $paths; ?>administration-useraccount.php">Mon compte</a>
                                </div>
                                <div>
                                    <?php if (isArtist()) { ?>
                                        <a href="<?= $paths; ?>current-sales.php">Mes ventes</a>
                                    <?php } ?>
                                </div>
                                <div>
                                    <?php if (isAdmin()) { ?>
                                        <a href="<?= $paths; ?>administration-useraccount.php">Administration</a>
                                    <?php } ?>
                                </div>
                                <a href="<?= $path; ?>logout.php">Déconnexion</a>
                            </div>
                        </div>


                    <?php } else { ?>
                        <div class="sign-in">
                            <a href="<?= $path; ?>interface-useraccount.php"><img src="./assets/icons/user.png" alt="user"></a>

                            <div class="connexion">
                                <ul>
                                    <li><a href="<?= $path; ?>interface-useraccount.php">Connexion</a></li>
                                    <li>Suivi de commandes</li>
                                </ul>
                                <!-- <p><a href="./interface-useraccount.php">Connexion</a></p>
                                <p>Suivi de commandes</p> -->
                            </div>
                        </div>
                    <?php } ?>

                    <div>
                        <a href="<?= $path; ?>panier.php"><img src="<?= $path; ?>assets/icons/shopping-cart.png" alt="panier">
                            Panier</a>
                    </div>
                </div>
            </div>

            <div id="trait"></div>
            <div id="trait"></div>

            <!-- Navigation dans le site -->
            <div class="navigation">
                <ul>
                    <li><a href="<?= $path; ?>all-photographies.php">Photographies</a></li>
                    <li><a href="liens vers les nouveautés">Nouveautés</a></li>
                    <li><a href="<?= $path; ?>page-artiste.php">Artistes</a></li>
                    <li><a href="liens vers les derniers exemplaires">Derniers exemplaires</a></li>
                </ul>
            </div>
        </header>
    </div>