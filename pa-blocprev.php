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
                <div class="choix" id="step1">
                    <div class="border">
                        <label>1</label>
                    </div>
                    <button>Format</button>
                </div>

                <div class="choix" id="step2">
                    <div class="border">
                        <label>2</label>
                    </div>
                    <button disabled>Finition</button>
                </div>

                <div class="choix" id="step3">
                    <div class="border">
                        <label>3</label>
                    </div>
                    <button disabled>Cadre</button>
                </div>
            </ul>
        </div>

        <div class="format-choice div-choices">
            <div class="format-list" data-format="classique">Classique <span>- 20 x 30cm, à partir de ...€</span></div>
            <div class="format-list" data-format="grand">Grand <span>- 60 x 75cm, à partir de ...€</span></div>
            <div class="format-list" data-format="geant">Géant <span>- 100 x 125cm, à partir de ...€</span></div>
            <div class="format-list" data-format="collector">Collector <span>- 120 x 150cm, à partir de ...€</span></div>
        </div>

        <div class="finition-choice div-choices" style="display: none;">
            <div class="finition-choice-1" style="display: none;">
                <div>Support aluminium <span>- Tirage contrecollé sur support aluminium</span></div>
                <div>Support aluminium avec verre acrylique <span>- Tirage contrecollé sur support aluminium avec finition protectrice en verre acrylique accentuant les contrastes et les couleurs</span></div>
            </div>
            <div class="finition-choice-2" style="display: none;">
                <div>Tirage sur papier photo <span>- Tirage sur papier photo expédié roulé, à accrocher ou à encadrer</span></div>
            </div>
            <div class="finition-choice-3" style="display: none;">
                <div>Passe-partout noir <span>- </span></div>
                <div>Passe-partout blanc <span>- </span></div>
            </div>
        </div>

        <div class="frame-choice div-choices" style="display: none;">
            <div class="frame-choice-1" style="display: none;">
                <div>Sans encadrement <span>- Format ...</span></div>
                <div>Encadrement noir satin <span>- Format ...</span></div>
                <div>Encadrement blanc satin <span>- Format ...</span></div>
                <div>Encadrement noyer <span>- Format ...</span></div>
                <div>Encadrement chêne <span>- Format ...</span></div>
            </div>
            <div class="frame-choice-2" style="display: none;">
                <div>Cadre alumium noir <span>- Format ...</span></div>
                <div>Bois blanc <span>- Format ...</span></div>
                <div>Acajou mat <span>- Format ...</span></div>
                <div>Aluminium brossé <span>- Format ...</span></div>
            </div>
        </div>

        <div class="beforeafter">
            <button id="before-button" style="visibility: hidden;">Etape précédente</button>
            <button id="after-button">Etape suivante</button>
        </div>

        <div class="total">
            <div>TOTAL</div>
            <div class="price">€</div>
        </div>

        <button class="finalchoice" disabled>
            Choisir cette finition
        </button>
        <div id="testprix"></div>
    </div>
</div>

<?php require_once './partials/footer.php'; ?>

<script>
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

    // function pAchat() {
    //     let formats = document.querySelectorAll('.format-list'); //Récupération de 4 <div class="format-list">
    //     for (let format of formats) { //boucle pour parcourir le tableau avec les 4 <div>
    //         format.addEventListener('click', e => { //ajout d'un évènement quand on clique sur une des <div>
    //             for (let format2 of formats) { //deuxième boucle pour enlever le border de sélection sur toutes les <div>
    //                 format2.style = "border : solid 1px #687079;";
    //             }
    //             format.style = "border: 2px solid #aca06c"; //ajout d'un border de sélection sur la dernière <div> cliquée
    //             let choice = format.getAttribute('value'); //la variable 'choice' récupère la valeur de la <div> sélectionnée.
    //             console.log(choice); //le log affiche correctement la valeur voulue.
    //             return choice; //WTF POURQUOI CA MARCHE PAAAAS ???
    //         });
    //     }
    // }

    let divformats = document.querySelectorAll('.format-list');

    const getFormat = (event, divformat) => {
        const format = event.currentTarget.dataset.format;
        divformat.style = "border: 2px solid #aca06c";
        priceFormat(50, format);
    }

    function priceFormat(unprix, unformat) {
        let prixduformat = '';
        if (unformat == 'classique') {
            prixduformat = unprix * 1.3;
        } else if (unformat == 'grand') {
            prixduformat = unprix * 2.6;
        } else if (unformat == 'geant') {
            prixduformat = unprix * 5.2;
        } else if (unformat == 'collector') {
            prixduformat = unprix * 13;
        }
        document.getElementById('testprix').innerHTML = prixduformat;
    }

    for (index = 0; index < divformats.length; index++) {
        let divformat = divformats[index];
        divformat.addEventListener('click', event => {
            for (let divformat2 of divformats) {
                divformat2.style = "border : solid 1px #687079;";
            };
            getFormat(event, divformat);
        });
    }
</script>

</body>

</html>