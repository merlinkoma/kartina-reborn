<?php
$title = 'ventes';
require_once './partials/header.php';
require_once './partials/ariane.php';
?>

<div class="sales">
    <div class="pagetitle">Nom de l'artiste - Ventes</div>
    <div class="ligne"></div>

    <div class="tables-bloc">
        <div class="current-sales sales-tables">
            <div class="title">Ventes en cours</div>
            <div class="ligne"></div>
            <table class="current-sales table">
                <tr>
                    <th>Nom de l'image</th>
                    <th>Prix unitaire</th>
                    <th>Quantité restante</th>
                    <th>Date de mise en vente</th>
                </tr>
                <tr>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td>lorem</td>
                </tr>
            </table>
        </div>

        <div class="past-sales sales-tables">
            <div class="title">Ventes passées</div>
            <div class="ligne"></div>
            <table class="past-sales table">
                <tr>
                    <th>Nom de l'image</th>
                    <th>Prix unitaire</th>
                    <th>Quantité vendue</th>
                    <th>Date de la fin de vente</th>
                </tr>
                <tr>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td>lorem</td>
                </tr>
            </table>
        </div>

    </div>

    <a href="./administration-useraccount.php" class="comeback">Revenir à la page d'administration du compte</a>

</div>

<?php require_once './partials/footer.php'; ?>

</body>

</html>