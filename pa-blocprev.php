<?php
$title = 'parcours';
require_once './partials/header.php';
require_once './partials/ariane.php';
$id = $_GET['id'];

$query = $db->prepare('SELECT * FROM picture INNER JOIN user ON picture.user_iduser = user.iduser WHERE idpicture = :id');
$query->execute([':id' => $id]);
$picture = $query->fetch();
?>


<div class="container">
    <div class="context">
        <figure id="alone">
            <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="image seule" id="alonepict">
            <figcaption>Image seule</figcaption>
        </figure>
        <figure id="room">
            <img src="./assets/banqueimg/salon-test.jpg" alt="image dans un salon" id="roompict">
            <figcaption>Vue dans un salon</figcaption>
        </figure>
    </div>

    <div class="leftprevisualisation">
        <div class="choice" id="bigprev">

            <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>">

            <h2><?= $picture['artist_name'] ?></h2>

            <p id="picturename"><?= $picture['title'] ?></p>

            <div class="authordescription">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem repellendus facere est temporibus,
                aspernatur et! Molestias rem quaerat cumque, nostrum, molestiae accusantium, inventore labore voluptas
                quasi vero nulla fugiat possimus.
                Exercitationem aperiam nesciunt asperiores necessitatibus magnam, at doloremque error recusandae
                accusantium? Officiis debitis, consequuntur veniam doloremque vero dolor ipsum cumque, animi rerum modi
                soluta harum at sequi quo laudantium accusantium.
                Vitae deleniti molestiae neque nulla saepe fugiat atque sit, dolorem corporis ipsum ad sint nisi quis
                dicta deserunt expedita omnis non culpa nam, architecto vero iusto at? Tempore, error rerum?
            </div>
        </div>


    </div>

    <div class="rightpersonnalisation">

        <h2>Créez votre photographie d'art sur mesure</h2>
        <hr>

        <div class="step">
            <ul>

                <button>
                    <li id="Format" onclick="changeFormat()">Format</li>
                </button>
                <button>
                    <li id="finitions" onclick="changeFinition()">Finition</li>
                </button>
                <button>
                    <li id="leCadre" onclick="changeCadre()">Cadre</li>
                </button>
            </ul>
        </div>

        <div class="typesupport">
            <div id="divtest" onclick="changeBorder()">Support type X</div>
            <div onclick="changeBorder()">Support type Y</div>
            <div onclick="changeBorder()">Support type Z</div>
        </div>

        <div class="beforeafter">
            <button>Etape précédente</button>
            <button>Etape suivante</button>
        </div>

        <div class="total">
            <div>TOTAL</div>
            <div class="price">€</div>
        </div>

        <div class="finalchoice">
            Choisir cette finition
        </div>
        <div class="pay">
            <a href="./stripe/public/index.html">PAYER</a>
        </div>
    </div>
</div>

<?php require_once './partials/footer.php'; ?>

<script>
    function changeContext() {
        let alone = document.getElementById('alonepict');
        alone.addEventListener('click', e => {
            document.getElementById('bigprev').innerHTML = "<img src='./assets/banqueimg/salon-test.jpg' alt=''>";
        });
    }

    function changeBorder() {
        document.getElementById('divtest').style = "border: solid 3px #aca06c";
    }

    function changeFormat() {

        document.querySelector('.typesupport div:nth-child(1)').innerHTML = "Grande";
        document.querySelector('.typesupport div:nth-child(2)').innerHTML = "Moyenne";
        document.querySelector('.typesupport div:nth-child(3)').innerHTML = "Petite";

    }

    function changeFinition() {
        document.querySelector('.typesupport div:nth-child(1)').innerHTML = "Support Aluminium";
        document.querySelector('.typesupport div:nth-child(2)').innerHTML = "Support aluminium avec acrylique";
        document.querySelector('.typesupport div:nth-child(3)').innerHTML = "tirage sur papier photo";

    }

    function changeCadre() {
        document.querySelector('.typesupport div:nth-child(1)').innerHTML = "Sans Encadrement";
        document.querySelector('.typesupport div:nth-child(2)').innerHTML = "Encadrement noir Satin";
        document.querySelector('.typesupport div:nth-child(3)').innerHTML = "Encadrement blanc satin";

    }
    document.querySelector('.typesupport div:nth-child(3)').addEventListener('click', changeTextButton);

    function changeTextButton() {
        console.log('coucou');
        document.querySelector('.finalchoice').innerHTML = "Ajouter au Panier";
    }
</script>

</body>

</html>