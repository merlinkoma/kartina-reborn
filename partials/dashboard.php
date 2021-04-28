<div class="container-dashboard">

    <div>
        <div>
            <a href="./../admin/administration-useraccount.php">Mon compte</a>
        </div>

        <div>
            <a href="./../admin/order-history.php">Mes commandes</a>
        </div>

        <?php if (isAdmin()) { ?>
            <div>
                <a href="">Activation des comptes vendeurs</a>
            </div>

            <div>
                <a href="">Gestion du statut des commandes</a>
            </div>
        <?php } ?>

        <div>
            <a href="./../logout.php">Déconnexion</a>
        </div>
    </div>
</div>