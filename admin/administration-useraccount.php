<?php
$title = 'user account';

$path = './../';
$paths = './';

require_once './../partials/header.php';
// require_once './../partials/ariane.php';

?>

<div class="flex" style="display : flex">
    <?php require_once './../partials/dashboard.php'; ?>


    <div class="useradmin">

        <!-- <aside class="aside">
            <div class="data-account menu">
                <h3>Mon compte</h3>
                <div class="line"></div>
                <a href="#">Données personnelles</a>
                <a href="#">Adresses</a>
            </div>

            <div class="order-informations menu">
                <h3>Informations de commandes</h3>
                <div class="line"></div>
                <a href="#">Historique de commandes</a>
            </div> -->

        <!-- visible uniquement sur les comptes vendeur -->

        <!-- <div class="photographies-menu menu">
                <h3>Photographies</h3>
                <div class="line"></div>
                <a href="#">Nouvelle vente</a>
                <a href="./sales.php">Vente en cours</a>
                <a href="./sales.php">Ventes passées</a>
            </div>

            <div class="artist-menu menu">
                <h3>Artiste</h3>
                <div class="line"></div>
                <a href="#">Biographie</a>
            </div> -->

        <!-- fin de div compte vendeur -->
        <!-- </aside> -->

        <section class="main-bloc">
            <div class="head">
                <h2 class="title">Mon compte | <?= $_SESSION['user']['firstname'], ' ', $_SESSION['user']['lastname']; ?></h2>
                <a href="./../logout.php" class="connection">(Déconnexion)</a>
            </div>

            <div class="line"></div>

            <div class="user-data">
                <div class="sous-sections">
                    <div class="titles"><a href="./data-editing.php"><img src="<?= $path; ?>assets/icons/003-user.svg" alt="user-icon" class="user-icon account-icons">
                            Données
                    </div>
                    Afficher ou mettre à jour vos informations personnelles.
                    </a>
                </div>

                <div class="sous-sections">
                    <div class="titles"><a href="./order-history.php"><img src="<?= $path; ?>assets/icons/002-box.svg" alt="user-icon" class="user-icon account-icons">
                            Commandes
                    </div>
                    Vérifier le statut de vos commandes ou voir les commandes passées.
                    </a>
                </div>

                <div class="sous-sections">
                    <div class="titles"><a href="./delivery-editing.php"><img src="<?= $path; ?>assets/icons/001-location.svg" alt="user-icon" class="user-icon account-icons">
                        Adresses
                    </div>
                        Gérez vos adresses de livraison et de facturation.
                    </a>
                </div>

            </div>

        </section>

    </div>
</div>
<?php require_once './../partials/footer.php'; ?>
</body>

</html>