<?php
$title = 'panier';
require_once './partials/header.php';
require_once './partials/ariane.php';

?>

<div class="container-panier">

    <div class="titre">
        <p>Votre Panier</p>
    </div>

    <div class="main">

        <div class="pic">
            <img src="./assets/icons/try.jpg" alt="photo du panier">
        </div>

        <div class="infos">
            <div>
                <h2>Nom de l'artiste</h2>
            </div>
            <div>
                <p>Description de la photographie</p>
            </div>
        </div>

        <div class="caracteristiques">
            <div>
                <div>
                    <h3>Format</h3>
                </div>
                <div>
                    <p>Grand - 60 x 75 cm</p>
                </div>
            </div>
            <div>
                <div>
                    <h3>Finition</h3>
                </div>
                <div>
                    <p>SUR PAPIER PHOTO</p>
                </div>
            </div>
            <div>
                <div>
                    <h3>Cadre</h3>
                </div>
                <div>
                    <p>Sans encadrement</p>
                </div>
            </div>
        </div>

        <div class="quantiter">
            <div>
                <h3><label for="quantity">Quantité</label></h3>
            </div>
            <div>
                <input type="number" name="quantite" id="quantity">
            </div>
            <div>
                <button type="reset"><a href="">Supprimer</a></button>
            </div>
        </div>

        <div class="prix">
            <h2 data-prix="110.00" id="calcul">110,00€</h2>
        </div>

    </div>

    <div class="finalisation">

        <div class="back">
            <button><a href="">&#8249; Continuer mes achats</a></button>
        </div>

        <div class="payement">
            <div class="promo">
                <input type="checkbox" name="reduc" id="reduction">
                <label for="reduction">J'ai une carte cadeau / un code promo</label>
            </div>

            <div class="pfinal">
                <div>
                    <h3>Total</h3>
                </div>
                <div class="finalprix">
                    <h2 id="fcalcul" data-prix="110.00">110,00€</h2>
                    <p>dont tva 20% : 18,32 €</p>
                </div>
            </div>

            <div>
                <button type="submit"><a href="">Valider ma commande</a></button>
            </div>

            <div class="securise">
                <p>Paiement sécurisé</p>
            </div>

            <div class="typepayement">
                <div>
                    <img src="./assets/icons/credit-card.svg" alt="CB">
                </div>
                <div>
                    <img src="./assets/icons/paypal.svg" alt="paypal">
                </div>
                <div>
                    <img src="./assets/icons/visa.svg" alt="visa">
                </div>
                <div>
                    <img src="./assets/icons/mastercard.svg" alt="MasterCard">
                </div>
                <div>
                    <img src="./assets/icons/american-express.svg" alt="AmericanExpress">
                </div>
            </div>
        </div>

    </div>

</div>

<?php require_once './partials/footer.php'; ?>

<script>
    document.getElementById("quantity").addEventListener('change', function(e) {

        let i = parseFloat(e.target.value);

        let calcul = document.getElementById("calcul").getAttribute('data-prix');
        let prix = parseFloat(calcul);

        let fcalcul = document.getElementById("fcalcul").getAttribute('data-prix');
        let fprix = parseFloat(fcalcul);

        if (i > 0) {
            document.getElementById("calcul").innerHTML = (i * prix).toFixed(2).replace('.', ',') + '€';

            document.getElementById("fcalcul").innerHTML = (i * fprix).toFixed(2).replace('.', ',') + '€';
            let tva = document.getElementById("fcalcul").innerHTML;
            tva = tva * 1.2;
        }
    })
</script>

</body>

</html>