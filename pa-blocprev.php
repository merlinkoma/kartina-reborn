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
            <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="photo dans un salon">
        </figure>
        <figure id="room">
            <img src="./assets/banqueimg/salon-test.jpg" alt="image d'un un salon">
        </figure>
    </div>

    <div class="leftprevisualisation">
        <div class="choice">
            <div class="avecmockup" style="display: block;">
                <div class="divquimenerve">
                    <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>" id="photosurlemur" class="<?php
                    if($picture['orientation_idorientation'] == 1){
                        echo 'photosurlemur1';
                    }elseif($picture['orientation_idorientation'] == 2){
                        echo 'photosurlemur2';
                    }elseif($picture['orientation_idorientation'] == 3){
                        echo 'photosurlemur3';
                    }elseif($picture['orientation_idorientation'] == 4){
                        echo 'photosurlemur4';
                    }
                    ?>">
                </div>
                <img src="./assets/banqueimg/salon-test.jpg" alt="image dans un salon" id="salon">
            </div>

            <div class="sansmockup" style="display: none;">
                <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>" id="">
            </div>

        </div>

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

    <div class="rightpersonnalisation">

        <h2>Créez votre photographie d'art sur mesure</h2>
        <hr>

        <div class="step">
            <ul>
                <div class="choix">
                    <div class="border">
                        <label for="">1</label>
                    </div>
                    <button>
                        <li id="Format" onclick="changeFormat()">Format</li>
                    </button>
                </div>
                <div class="choix">
                    <label for="">2</label>
                    <button>
                        <li id="finitions" onclick="changeFinition()">Finition</li>
                    </button>
                </div>
                <div class="choix">
                    <label for="">3</label>
                    <button>
                        <li id="leCadre" onclick="changeCadre()">Cadre</li>
                    </button>
                </div>
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
        let alone = document.getElementById('alone');
        let room = document.getElementById('room');
        let sansmockup = document.querySelector('.sansmockup');
        let avecmockup = document.querySelector('.avecmockup');
        alone.addEventListener('click', e =>{
            sansmockup.style = "display : block";
            avecmockup.style = "display : none";
        });
        room.addEventListener('click', e =>{
            sansmockup.style = "display : none";
            avecmockup.style = "display : bock";
        });
    }
    changeContext();

    function changeBorder() {
        document.querySelector('#divtest').style = "border: solid 3px #aca06c";
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