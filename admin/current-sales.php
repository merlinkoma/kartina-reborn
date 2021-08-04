<?php
$title = 'Ventes en cours';

$path = './../';
$paths = './';

require_once './../partials/header.php';

global $db;
$query = $db->prepare('SELECT * FROM picture WHERE user_iduser = :user_iduser');
$query->bindValue(':user_iduser', $_SESSION['user']['iduser']);
$query->execute();
$sales = $query->fetchAll();
?>

<div class="dashboard-current-sales" style="display : flex">

    <?php require_once './../partials/dashboard.php'; ?>

    <div class="current-sales-container">

        <div class="title">
            <h1>Ventes en cours :</h1>
        </div>

        <?php foreach ($sales as $sale) { ?>
            <div class="card">

                <div class="product">

                    <div class="picture">
                        <img src="./../assets/banqueimg/<?= $sale['cover']; ?>" alt="">
                    </div>

                    <div class="title-product">
                        <h4>Titre : <?= $sale['title']; ?></h4>
                    </div>

                    <div class="date">
                        <p>Date de début de la vente : <?= $sale['creation_date']; ?></p>
                    </div>

                    <div class="already-sold">
                        <p>Déjà vendu : </p>
                    </div>

                    <div class="in-sale">
                        <p>Quantité : <?= $sale['quantity']; ?></p>
                    </div>

                    <div class="price">
                        <p>Prix initaire de la vente : <?= $sale['price']; ?></p>
                    </div>

                </div>

            </div>
        <?php } ?>
    </div>
</div>
<?php require_once './../partials/footer.php'; ?>