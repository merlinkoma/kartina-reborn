<?php
$title = 'accueil';
require_once './partials/header.php';
require_once './partials/ariane.php';

$randompictures = $db->query('SELECT * FROM picture INNER JOIN user ON picture.user_iduser = user.iduser ORDER BY RAND() LIMIT 6')->fetchAll();
$randombanner = $db->query('SELECT * FROM picture WHERE orientation_idorientation = 2 ORDER BY RAND() LIMIT 1')->fetch();
$randomquatros = $db->query('SELECT * FROM picture WHERE orientation_idorientation = 3 ORDER BY RAND() LIMIT 4')->fetchAll();

?>

<main class="mainaccueil">
    <!-- SECTION 1 NOUVELLES OEUVRES -->
    <div class="homebanner">
        <img src="./assets/banqueimg/<?=$randombanner['cover']?>" alt="background" class="background-header">
        <div class="header-titles">
            <h1>Nouvelles oeuvres</h1>
            <p>La légendaire collection Everest</p>
            <a href="" class="newcoll">Explorer la nouvelle collection ></a>
        </div>
    </div>

    <!-- SECTION 2 PHOTO D'ART -->
    <div class="main">
        <div class="banner">
            <h1>Photographies d'art</h1>
            <p>Oeuvres en édition limitée et numérotée avec certificat d'authenticité</p>
        </div>

        <div class="articles">

            <?php
            foreach ($randompictures as $randompicture) { ?>

                <figure id="fig1">
                    <div class="image"><img src="./assets/banqueimg/<?=$randompicture['cover']?>" alt=""></div>
                    <figcaption class="legendeimg">
                        <div class="legendeimg1">
                            <p><a href="./page-artiste.php?id=<?=$randompicture['user_iduser']?>"><?=$randompicture['artist_name']?></a></p>
                            <p><?=$randompicture['title']?></p>
                            <p>Edition limitée</p>
                        </div>
                        <div class="legendeimg2">
                            <p>à partir de</p>
                            <p><a href="./pa-blocprev.php"><?=$randompicture['price']?> €</a></p>
                        </div>
                    </figcaption>
                </figure>
            <?php } ?>

        </div>

        <div class="ligne"></div>

        <div class="explorecoll">
            <a href="">Explorer la collection ></a>
        </div>

    </div>

    <!-- SECTION 3 QUATRO -->
    <div class="quatro">
        <h1>QUATRO</h1>
        <div class="gridquatro">
            <div class="quatro1 quatro"><a href="">Voyages ></a>

            </div>
            <div class="quatro2 quatro"><a href="">N&B></a>

            </div>
            <div class="quatro3 quatro"><a href="">Artiste ></a>

            </div>
            <div class="quatro4 quatro"><a href="">Derniers exemplaires ></a></div>
        </div>
    </div>

    <!-- Mention Creative Commons -->
    <div class="creative-commons">
        <p>Toutes les images de ce site sont sous licence Creative Commons - MerlinK</p>
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br />Ces images sont mises à
        disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Licence Creative Commons Attribution - Pas
            d’Utilisation Commerciale - Partage dans les Mêmes Conditions 4.0 International</a>
    </div>
</main>

<?php require_once './partials/footer.php'; ?>

</body>

</html>