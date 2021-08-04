<div class="container-dashboard">

    <div>
        <div>
            <a href="./../admin/administration-useraccount.php">Mon compte</a>
        </div>

        <div>
            <a href="./../admin/order-history.php">Mes commandes</a>
        </div>

        <?php if (isArtist()) { ?>
            <div>
                <p>Photographies</p>
                <ul>
                    <a href="./../admin/new-sales.php"><li>Nouvelle vente</li></a>
                    <a href="./../admin/current-sales.php"><li>Ventes en cours</li></a>
                    <a href=""><li>Ventes passées</li></a>
                </ul>
            </div>

            <div>
                <p>Artiste</p>
                <ul>
                    <a href="./../admin/biography.php"><li>Biographie</li></a>
                </ul>
            </div>
        <?php } ?>

        <?php if (isAdmin()) { ?>
            <div>
                <a href="./../admin/activation-promotion.php">Activation des comptes vendeurs</a>
            </div>

            <div>
                <a href="">Gestion du statut des commandes</a>
            </div>
        <?php } ?>

        <?php if (isUser()) { ?>
            <div>
                <a href="./../admin/utilisateur-promotion.php">Promotion</a>
            </div>
        <?php } ?>

        <div>
            <a href="./../logout.php">Déconnexion</a>
        </div>
    </div>
</div>