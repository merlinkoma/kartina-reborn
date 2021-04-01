<?php

session_start();
ob_start();

$title = 'panier';
require_once './partials/header.php';
require_once './partials/ariane.php';

global $db;

$clear = isset($_GET['clear']) ? true : false;

// if ($clear) {
//     unset($_SESSION['panier']);

//     header('Location: panier.php');
// }

$_SESSION['panier'] = [
    [
        'name' => 'Produit 1',
        'picture' => 'Cover 1',
        'price' => '1000'
    ],
    [
        'name' => 'Produit 2',
        'picture' => 'Cover 2',
        'price' => '2000'
    ]
];

function panier()
{
    return $_SESSION['panier'] ?? [];
}


?>


<div class="container-panier">

    <div class="titre">
        <p>Votre Panier :</p>
    </div>

    <?php if (empty(panier())) { ?>
        <h2>Votre panier est vide...</h2>
    <?php } ?>

    <?php if (!empty(panier())) { ?>
        <?php foreach (panier() as $panier) { ?>
            <div class="main">


                <div class="pic">
                    <img src="./assets/icons/try.jpg" alt="photo du panier">
                </div>

                <div class="infos">
                    <div>
                        <h2><?= $panier['name']; ?></h2>
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

                <div class="quantite">
                    <div>
                        <h3><label for="quantity">Quantité</label></h3>
                    </div>
                    <div>
                        <input type="number" class="quantity" name="quantite" value="1">
                    </div>
                    <div>
                        <button type="reset"><a href="">Supprimer</a></button>
                    </div>
                </div>

                <div class="prix">
                    <h2 class="totalProductPrice" data-prix="<?= $panier['price']; ?>"><?= $panier['price']; ?>€</h2>
                </div>

            </div>
        <?php } ?>

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
                        <h2 id="totalPriceElement">
                            <? $panier['price']?>€
                        </h2>
                        <p id="tva">dont tva 20% :
                            <? $panier['price'] ?>
                        </p>
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

    <?php } ?>
</div>

<?php require_once './partials/footer.php'; ?>

<script>
    let productElements = document.getElementsByClassName("main");
    let quantitiesElement = document.getElementsByClassName("quantity");
    let totalProductPriceElement = document.getElementsByClassName("totalProductPrice");
    let totalPriceElement = document.getElementById("totalPriceElement");
    let tvaElement = document.getElementById("tva");
    let totalPrice = 0;

    for (let i = 0; i < productElements.length; i++) {

        let dataprix = totalProductPriceElement[i].getAttribute('data-prix');
        let prix = parseFloat(dataprix);

        totalPrice += prix;

    }

    let tva = (totalPrice / 100) * 20;
    totalPrice += tva;
    totalPriceElement.innerHTML = totalPrice.toFixed(2).replace('.', ',') + '€';
    tvaElement.innerHTML = 'DONT TVA 20% : ' + tva + '€';

    for (let i = 0; i < productElements.length; i++) {
        quantitiesElement[i].addEventListener('change', function(e) {
            let quantity = parseFloat(e.target.value);

            let dataprix = totalProductPriceElement[i].getAttribute('data-prix');
            let prix = parseFloat(dataprix) * quantity;
            totalProductPriceElement[i].innerHTML = prix.toFixed(2).replace('.', ',') + '€';
            totalPrice = 0;

            for (let j = 0; j < productElements.length; j++) {

                let totalProductPrice = parseFloat(totalProductPriceElement[j].innerHTML.replace('€', '').replace(',', '.'));
                totalPrice += totalProductPrice;

            }


            tva = (totalPrice / 100) * 20;
            totalPrice += tva;
            totalPriceElement.innerHTML = totalPrice.toFixed(2).replace('.', ',') + '€';
            tvaElement.innerHTML = 'DONT TVA 20% : ' + tva + '€';
        })
    }
</script>

</body>

</html>