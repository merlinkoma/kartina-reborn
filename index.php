<?php
$title = 'accueil';
require_once './partials/header.php';
require_once './partials/ariane.php';
?>

<main class="mainaccueil">
    <!-- SECTION 1 NOUVELLES OEUVRES -->
    <div class="homebanner">
        <img src="./assets/banqueimg/filrouge10.jpg" alt="background" class="background-header">
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

            <figure id="fig1">
                <div class="image"><img src="./assets/banqueimg/filrouge13.jpg" alt=""></div>
                <figcaption class="legendeimg">
                    <div class="legendeimg1">
                        <p><a href="./page-artiste.php">Marie Martin</a></p>
                        <p>Edition limitée</p>
                    </div>
                    <div class="legendeimg2">
                        <p>à partir de...</p>
                        <p><a href="./pa-blocprev.php">...€</a></p>
                    </div>
                </figcaption>
            </figure>

            <figure id="fig2">
                <div class="image"><img src="./assets/banqueimg/filrouge75.jpg" alt=""></div>
                <figcaption class="legendeimg">
                    <div class="legendeimg1">
                        <p>Nom de l'auteur</p>
                        <p>Edition limitée</p>
                    </div>
                    <div class="legendeimg2">
                        <p>à partir de...</p>
                        <p>...€</p>
                    </div>
                </figcaption>
            </figure>

            <figure id="fig3">
                <div class="image"><img src="./assets/banqueimg/filrouge15.jpg" alt=""></div>
                <figcaption class="legendeimg">
                    <div class="legendeimg1">
                        <p>Nom de l'auteur</p>
                        <p>Edition limitée</p>
                    </div>
                    <div class="legendeimg2">
                        <p>à partir de...</p>
                        <p>...€</p>
                    </div>
                </figcaption>
            </figure>

            <figure id="fig4">
                <div class="image"><img src="./assets/banqueimg/filrouge72.jpg" alt=""></div>
                <figcaption class="legendeimg">
                    <div class="legendeimg1">
                        <p>Nom de l'auteur</p>
                        <p>Edition limitée</p>
                    </div>
                    <div class="legendeimg2">
                        <p>à partir de...</p>
                        <p>...€</p>
                    </div>
                </figcaption>
            </figure>

            <figure id="fig5">
                <div class="image"><img src="./assets/banqueimg/filrouge24.jpg" alt=""></div>
                <figcaption class="legendeimg">
                    <div class="legendeimg1">
                        <p>Nom de l'auteur</p>
                        <p>Edition limitée</p>
                    </div>
                    <div class="legendeimg2">
                        <p>à partir de...</p>
                        <p>...€</p>
                    </div>
                </figcaption>
            </figure>

            <figure id="fig6">
                <div class="image"><img src="./assets/banqueimg/filrouge28.jpg" alt=""></div>
                <figcaption class="legendeimg">
                    <div class="legendeimg1">
                        <p>Nom de l'auteur</p>
                        <p>Edition limitée</p>
                    </div>
                    <div class="legendeimg2">
                        <p>à partir de...</p>
                        <p>...€</p>
                    </div>
                </figcaption>
            </figure>

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