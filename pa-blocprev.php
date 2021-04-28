<?php
$title = 'parcours';
require_once './partials/header.php';
require_once './partials/ariane.php';
$id = $_GET['id'];

$query = $db->prepare('SELECT * FROM picture INNER JOIN user ON picture.user_iduser = user.iduser WHERE idpicture = :id');
$query->execute([':id' => $id]);
$picture = $query->fetch();

$query = $db->query('SELECT * FROM format');
$formats = $query->fetchAll();

$query = $db->query('SELECT * FROM finition');
$finitions = $query->fetchAll();

$query = $db->query('SELECT * FROM cadre');
$frames = $query->fetchAll();

$pictureprice = $picture['price'];

class Parcours
{
    public $pictureid;
    public $pictureprice;
    public $format = 0;
    public $finition = 0;
    public $frame = 0;
    public $price = [];

    public function __construct($pictureid, $pictureprice)
    {
        $this->pictureid = $pictureid;
        $this->pictureprice = $pictureprice;
    }
}

if (!empty($_POST)) {
    //@TODO sécuriser le formulaire
    $parcours = new Parcours($id, $pictureprice);
    $parcours->format = $_POST['format'];
    $parcours->finition = $_POST['finition'];
    $parcours->frame = $_POST['frame'];
    $parcours->price['formatprice'] = round($_POST['formatprice'], 2);
    $parcours->price['finitionprice'] = round($_POST['finitionprice'], 2);
    $parcours->price['frameprice'] = round($_POST['frameprice'], 2);

    //@TODO à la place du dump : ajout de l'oeuvre dans la session->pannier
    var_dump($parcours);
}
?>


<div class="container">
    <div class="context">
        <figure id="alone">
            <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="photo dans un salon">
        </figure>
        <figure id="room">
            <img src="./assets/banqueimg/salon-test.jpg" alt="image d'un salon">
        </figure>
    </div>

    <div class="leftprevisualisation">
        <div class="choice">
            <div class="avecmockup" style="display: none;">
                <div class="divquimenerve">
                    <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>" id="photosurlemur" data-orientation="<?php
                                                                                                                                                if ($picture['orientation_idorientation'] == 1) {
                                                                                                                                                    echo 'portrait';
                                                                                                                                                } elseif ($picture['orientation_idorientation'] == 2) {
                                                                                                                                                    echo 'paysage';
                                                                                                                                                } elseif ($picture['orientation_idorientation'] == 3) {
                                                                                                                                                    echo 'portrait';
                                                                                                                                                } elseif ($picture['orientation_idorientation'] == 4) {
                                                                                                                                                    echo 'paysage';
                                                                                                                                                }
                                                                                                                                                ?>">
                </div>

                <img src="./assets/banqueimg/salon-test.jpg" alt="image dans un salon" id="salon">

            </div>

            <div class="sansmockup" style="display: block;">
                    <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>" id="photopassurlemur">
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

        <div class="steps-labels">
            <div class="step-label">
                <div class="border">
                    <label>1</label>
                </div>
                <div class="step-name" id="step1">Format</div>
            </div>

            <div class="step-label">
                <div class="border">
                    <label>2</label>
                </div>
                <div class="step-name" id="step2">Finition</div>
            </div>

            <div class="step-label">
                <div class="border">
                    <label>3</label>
                </div>
                <div class="step-name" id="step3">Cadre</div>
            </div>
        </div>

        <div class="div-choices div-format">
            <div class="div-choice" data-format="classique" data-type="format">Classique <span>- 24 x 30cm, à partir de </span><?= $pictureprice * $formats[0]['cost'] ?> €</div>

            <div class="div-choice" data-format="grand" data-type="format">Grand <span>- 60 x 75cm, à partir de </span><?= $pictureprice * $formats[1]['cost'] ?> €</div>

            <div class="div-choice" data-format="geant" data-type="format">Géant <span>- 100 x 125cm, à partir de </span><?= $pictureprice * $formats[2]['cost'] ?> €</div>

            <div class="div-choice" data-format="collector" data-type="format">Collector <span>- 120 x 150cm, à partir de </span><?= $pictureprice * $formats[3]['cost'] ?> €</div>
        </div>

        <div class="div-choices div-finition" style="display: none">

            <div class="finition-choice-1 sub-div-choices">

                <div class="div-choice" data-finition="paper_draw" data-type="finition">Tirage sur papier photo <span>Papier roulé, à encadrer</div>

                <div class="div-choice" data-finition="aluminium" data-type="finition">Support aluminium <span>Tirage contrecollé sur support aluminium</div>

                <div class="div-choice" data-finition="acrylic" data-type="finition">Support aluminium avec verre acrylique <span>Tirage contrecollé sur support aluminium avec protection en verre acrylique</div>

            </div>

            <div class="finition-choice-2 sub-div-choices">

                <div class="div-choice" data-finition="pp_black" data-type="finition">Passe-partout noir</div>

                <div class="div-choice" data-finition="pp_white" data-type="finition">Passe-partout blanc</div>

            </div>
        </div>

        <div class="div-choices div-frame" style="display: none">

            <div class="frame-choice-1 sub-div-choices">

                <div class="div-choice" data-frame="none" data-type="frame">Sans encadrement <span>- Tirage contrecollé sur support aluminium</span></div>

                <div class="div-choice" data-frame="black_satin" data-type="frame">Encadrement noir satin <span>- Caisse américaine noire satinée</span></div>

                <div class="div-choice" data-frame="white_satin" data-type="frame">Encadrement blanc satin <span>- Caisse américaine blanche satinée</span></div>

                <div class="div-choice" data-frame="walnut" data-type="frame">Encadrement noyer <span>- Caisse américaine en noyer massif</span></div>

                <div class="div-choice" data-frame="oak" data-type="frame">Encadrement chêne <span>- Caisse américaine en chêne massif</span></div>

            </div>
            <div class="frame-choice-2 sub-div-choices">

                <div class="div-choice" data-frame="black_aluminium" data-type="frame">Cadre alumium noir<span> - Format 50 x 40cm</span></div>

                <div class="div-choice" data-frame="white_wood" data-type="frame">Bois blanc <span> - Format 50 x 40cm</span></div>

                <div class="div-choice" data-frame="mahogany" data-type="frame">Acajou mat <span> - Format 50 x 40cm</span></div>

                <div class="div-choice" data-frame="brushed_aluminium" data-type="frame">Aluminium brossé <span> - Format 50 x 40cm</span></div>

            </div>
            <div class="frame-choice-3 sub-div-choices">

                <div class="div-choice" data-frame="noframe" data-type="frame">Cadre non disponible</div>

            </div>
        </div>

        <div id="summary"></div>
        <div id="summaryprice"></div>
        <div class="total">

            <div id="prix"></div>
        </div>

        <button id="nextbutton" disabled>
            Etape suivante
        </button>

        <form method="post" name="form">
            <input type="text" name="format" id="format" hidden>
            <input type="text" name="finition" id="finition" hidden>
            <input type="text" name="frame" id="frame" hidden>
            <input type="text" name="formatprice" id="formatprice" hidden>
            <input type="text" name="finitionprice" id="finitionprice" hidden>
            <input type="text" name="frameprice" id="frameprice" hidden>
            <button id="formbutton" hidden>Valider cette sélection</button>
        </form>

    </div>
</div>
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
<script src="./assets/js/opti-pa-achat.js"></script>
</body>

</html>