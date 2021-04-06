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
            <div class="frame-choice-3" style="display: none;">
                <div>Cadre non disponible</div>
            </div>
        </div>

        <div class="beforeafter">
            <button id="before-button" style="visibility: hidden;">Etape précédente</button>
            <button id="after-button">Etape suivante</button>
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
    let price = <?= $pictureprice ?>;

    //Récupération du tableau des <div> de format (step 1)
    let divformats = document.querySelectorAll('.format-list');
    //Récupération du tableau des <div> de finition (step 2)
    let divfinitions = document.querySelectorAll('.finition-list');

    //Bouton pour passer à l'étape suivante
    let stepsbutton = document.querySelector('#stepsbutton');
    //Label 2
    let step2 = document.querySelector('#step2');
    //Label 3
    let step3 = document.querySelector('#step3');

    //ETAPE 2 : 
    // -> récupérer la valeur du data-format dans la <div> sélectionnée, 
    // -> appliquer une bordure de sélection sur la <div> choisie
    // -> appeler la fonction priceFormat
    const getFormat = (event, divformat) => {
        const format = event.currentTarget.dataset.format;
        divformat.style = "border: 2px solid #aca06c";
        priceFormat(price, format);
    }

    //ETAPE 5 : 
    // -> récupérer la valeur du data-finition dans la <div> sélectionnée,
    // -> appliquer une bordure de sélection sur la <div> choisie
    // -> appeler la fonction priceFinition
    const getFinition = (event, divfinition, prixduformat) => {
        const finition = event.currentTarget.dataset.finition;
        divfinition.style = "border: 2px solid #aca06c";
        priceFinition(prixduformat, finition);
    }

    //ETAPE 3 : la fonction priceFormat permet de calculer le prix de l'image selon le format choisi. Puis :
    // -> Affiche le prix dans la div#prix
    // -> Si le format choisi est bien dans la liste, activation du bouton 'stepsbutton',
    // ->  Au clic sur ce bouton, déclenchement d'un évènement qui cache les <div> format et affiche une des deux <div> finition, selon le format choisi.
    // -> désactivation du bouton 'stepsbutton'.
    // -> appel de la fonction stepTwo.
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

        document.getElementById('prix').innerHTML = 'TOTAL : ' + prixduformat + '€';

        //passer à l'étape suivante seulement si les valeurs choisies correspondent à l'une des suivantes 
        if (unformat == 'classique' || unformat == 'grand' || unformat == 'geant' || unformat == 'collector') {
            stepsbutton.disabled = false;
        };

        stepsbutton.addEventListener('click', event => {
            document.querySelector('.format-choice').style = "display: none;";
            step2.disabled = false;
            document.querySelector('.finition-choice').style = "display: block;";
            if (unformat == 'classique') {
                document.querySelector('.finition-choice-2').style = "display: block;";
            } else {
                document.querySelector('.finition-choice-1').style = "display: block;";
            }
        });
        //stepsbutton.disabled = true;
        stepTwo(prixduformat);
    }

    //ETAPE 6 : 
    function priceFinition(prixduformat, lafinition) {
        let prixdelafinition = '';
        if ((lafinition == 'pp_black') || (lafinition == 'paper_draw')) {
            prixdelafinition = prixduformat;
        } else if (lafinition == 'pp_white') {
            prixdelafinition = prixduformat * 1.4;
        } else if (lafinition == 'aluminium') {
            prixdelafinition = prixduformat * 2.6;
        } else if (lafinition == 'acrylic') {
            prixdelafinition = prixduformat * 3.35;
        }
        document.getElementById('prix').innerHTML = 'TOTAL : ' + prixdelafinition + '€';

        if (lafinition == 'pp_black' || lafinition == 'pp_white' || lafinition == 'paper_draw' || lafinition == 'aluminium' || lafinition == 'acrylic') {
            stepsbutton.disabled = false;
        };

        stepsbutton.addEventListener('click', event => {
            document.querySelector('.finition-choice').style = "display: none;";
            step3.disabled = false;
            document.querySelector('.frame-choice').style = "display: block;";
            if (lafinition == 'aluminium' || lafinition == 'acrylic') {
                document.querySelector('.frame-choice-1').style = "display: block;";
            } else if (lafinition == 'pp_black' || lafinition == 'pp_white'){
                document.querySelector('.frame-choice-2').style = "display: block;";
            } else {
                document.querySelector('.frame-choice-3').style = "display: block;";
            }
            //stepsbutton.disabled = true;
        });
    }

    //ETAPE 4 :
    // -> même code qu'à l'ETAPE 1 pour afficher/masquer les bordures de sélection, appel de la fonction getFinition
    function stepTwo(prixduformat) {
        for (index = 0; index < divfinitions.length; index++) {
            //Désactivation du bouton stepsbutton tant que le choix de la finition n'est pas fait.
            //stepsbutton.disabled = true;
            let divfinition = divfinitions[index];
            divfinition.addEventListener('click', event => {
                for (let divfinition2 of divfinitions) {
                    divfinition2.style = "border : solid 1px #687079;";
                };
                getFinition(event, divfinition, prixduformat);
            });
        }
    }

    //ETAPE 1 : parcourir les <div> format, ajouter un évènement au clic :
    // -> enlever les bordures de sélection partout
    // -> appeler la fonction getFormat
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