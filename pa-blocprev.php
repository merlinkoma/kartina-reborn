<?php
$title = 'parcours';
require_once './partials/header.php';
require_once './partials/ariane.php';
$id = $_GET['id'];

$query = $db->prepare('SELECT * FROM picture INNER JOIN user ON picture.user_iduser = user.iduser WHERE idpicture = :id');
$query->execute([':id' => $id]);
$picture = $query->fetch();

$pictureprice = $picture['price'];
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
            <div class="avecmockup" style="display: none;">
                <div class="divquimenerve">
                    <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>" id="photosurlemur" class="
                    <?php
                    if ($picture['orientation_idorientation'] == 1) {
                        echo 'photosurlemur1';
                    } elseif ($picture['orientation_idorientation'] == 2) {
                        echo 'photosurlemur2';
                    } elseif ($picture['orientation_idorientation'] == 3) {
                        echo 'photosurlemur3';
                    } elseif ($picture['orientation_idorientation'] == 4) {
                        echo 'photosurlemur4';
                    }
                    ?>">
                </div>
                <img src="./assets/banqueimg/salon-test.jpg" alt="image dans un salon" id="salon">
            </div>

            <div class="sansmockup" style="display: block;">
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
                        <label>1</label>
                    </div>
                    <button id="step1">Format</button>
                </div>

                <div class="choix">
                    <div class="border">
                        <label>2</label>
                    </div>
                    <button id="step2" disabled>Finition</button>
                </div>

                <div class="choix">
                    <div class="border">
                        <label>3</label>
                    </div>
                    <button id="step3" disabled>Cadre</button>
                </div>
            </ul>
        </div>

        <div class="format-choice div-choices">
            <div class="format-list" data-format="classique">Classique <span>- 20 x 30cm, à partir de </span><?= ($pictureprice * 1.3) ?>€</div>
            <div class="format-list" data-format="grand">Grand <span>- 60 x 75cm, à partir de </span><?= ($pictureprice * 2.6) ?>€</div>
            <div class="format-list" data-format="geant">Géant <span>- 100 x 125cm, à partir de </span><?= ($pictureprice * 5.2) ?>€</div>
            <div class="format-list" data-format="collector">Collector <span>- 120 x 150cm, à partir de </span><?= ($pictureprice * 13) ?>€</div>
        </div>

        <div class="finition-choice div-choices" style="display: none;">
            <div class="finition-choice-1" style="display: none;">
                <div class="finition-list" data-finition="paper_draw">Tirage sur papier photo <span>- Tirage sur papier photo expédié roulé, à accrocher ou à encadrer</span></div>
                <div class="finition-list" data-finition="aluminium">Support aluminium <span>- Tirage contrecollé sur support aluminium</span></div>
                <div class="finition-list" data-finition="acrylic">Support aluminium avec verre acrylique <span>- Tirage contrecollé sur support aluminium avec finition protectrice en verre acrylique accentuant les contrastes et les couleurs</span></div>
            </div>
            <div class="finition-choice-2" style="display: none;">
                <div class="finition-list" data-finition="pp_black">Passe-partout noir <span>- </span></div>
                <div class="finition-list" data-finition="pp_white">Passe-partout blanc <span>- </span></div>
            </div>
        </div>

        <div class="frame-choice div-choices" style="display: none;">
            <div class="frame-choice-1" style="display: none;">
                <div class="frame-list" data-frame="none">Sans encadrement <span>- Format ...</span></div>
                <div class="frame-list" data-frame="black_satin">Encadrement noir satin <span>- Format ...</span></div>
                <div class="frame-list" data-frame="white_satin">Encadrement blanc satin <span>- Format ...</span></div>
                <div class="frame-list" data-frame="walnut">Encadrement noyer <span>- Format ...</span></div>
                <div class="frame-list" data-frame="oak">Encadrement chêne <span>- Format ...</span></div>
            </div>
            <div class="frame-choice-2" style="display: none;">
                <div class="frame-list" data-frame="black_aluminium">Cadre alumium noir <span>- Format ...</span></div>
                <div class="frame-list" data-frame="white_wood">Bois blanc <span>- Format ...</span></div>
                <div class="frame-list" data-frame="mahogany">Acajou mat <span>- Format ...</span></div>
                <div class="frame-list" data-frame="brushed_aluminium">Aluminium brossé <span>- Format ...</span></div>
            </div>
            <div class="frame-choice-3" style="display: none;">
                <div class="frame-list" data-frame="noframe">Cadre non disponible</div>
            </div>
        </div>

        <div class="total">
            <div id="prix"></div>
        </div>

        <button id="stepsbutton" disabled>
            Choisir cette finition
        </button>
    </div>
</div>

<?php require_once './partials/footer.php'; ?>

<script>
    //Fonction pour afficher l'image seule ou dans un salon
    function changeContext() {
        let alone = document.getElementById('alone');
        let room = document.getElementById('room');
        let sansmockup = document.querySelector('.sansmockup');
        let avecmockup = document.querySelector('.avecmockup');
        alone.addEventListener('click', e => {
            sansmockup.style = "display : block";
            avecmockup.style = "display : none";
        });
        room.addEventListener('click', e => {
            sansmockup.style = "display : none";
            avecmockup.style = "display : bock";
        });
    }
    changeContext();

    /*PARCOURS D'ACHAT*/

    //Récupération du prix de base donné par l'artiste dans la BDD
    var price = <?= $pictureprice ?>;
</script>
<script src="./assets/js/pa-blocprev.js"></script>
</body>

</html>