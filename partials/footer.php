<?php
$query = $db->query('SELECT * FROM theme');
$themes = $query->fetchAll();
?>

<footer id="footer" class="footer">

    <!-- BLOC FIND-GALLERY -->
    <div class="find-gallery">
        <img src="./assets/images/galery.jpg" alt="">
        <form action="" method="GET" class="find-gallery-form">
            <label for="find-gallery-field">TROUVER UNE GALERIE</label>
            <input id="find-gallery-field" type="text" name="address" placeholder="Ville, code postal, rue..." required="">
        </form>
    </div>

    <div class="ligne"></div>

    <!-- BLOC LINKS PHOTOGRAPHIES -->
    <div class="blocs">
        <div class="col-photographies columns">

            <h3>Photographies</h3>

            <div class="liste-col-photographies">
                <ul class="liste-col-photographies1">

                    <?php
                    foreach ($themes as $theme) { ?>
                        <li class="<?= $theme['idtheme'] ?>"><a href="#"><?= $theme['theme_name'] ?></a>
                        </li>
                    <?php }
                    ?>

                </ul>
                <ul class="liste-col-photographies2">

                    <li class="artistes"><a href="./page-artiste.php">Artistes</a></li>


                    <li class="nouveautes"><a href="https://www.yellowkorner.com/fr/photographies-dart/nouveautes/">Nouveautés</a>
                    </li>

                    <li class="meilleuresventes"><a href="https://www.yellowkorner.com/fr/photographies-dart/meilleures-ventes/">Meilleures
                            ventes</a></li>

                    <li class="dernierstirages"><a href="https://www.yellowkorner.com/fr/photographies-dart/derniers-exemplaires/">Derniers
                            tirages</a></li>

                    <li class="inspirations"><a href="https://www.yellowkorner.com/fr/inspirations">Inspirations</a>
                    </li>

                </ul>
            </div>

        </div>

        <!-- BLOC A PROPOS -->

        <div class="col-apropos columns">
            <h3>A propos</h3>

            <ul class="liste-col-apropos">

                <li class="magazine"><a href="https://www.yellowkorner.com/fr/blog">Magazine</a></li>

                <li class="concept"><a href="https://www.yellowkorner.com/fr/le-concept-de-yellowkorner-Savoir_Faire.html">Concept</a>
                </li>

                <li class="laboratoire"><a href="https://www.yellowkorner.com/fr/le-savoir-faire-yellowkorner-Laboratoire.html">Laboratoire</a>
                </li>

                <li class="galeries"><a href="https://www.yellowkorner.com/fr/stores">Galeries</a></li>

                <li class="devenirfranchise"><a href="https://franchise.yellowkorner.com">Devenir franchisé</a>
                </li>

                <li class="nousrejoindre"><a href="https://www.yellowkorner.com/fr/recrutement-et-candidature-Nous_Rejoindre.html">Nous
                        rejoindre</a></li>

            </ul>

        </div>

        <!-- BLOC AIDE ET GUIDE -->

        <div class="col-aideetguide columns">

            <h3>Aide &amp; Guide</h3>

            <ul class="liste-col-aideetguide">

                <li class="ouestlacommande"><a href="">Où est ma commande ?</a></li>

                <li class="livraisonsetretours"><a href="">Livraison et retours</a></li>

                <li class="guideformats"><a href="">Guide des formats et finitions</a></li>

            </ul>

        </div>

    </div>

    <div class="ligne"></div>

    <!-- NEWSLETTER -->
    <div class="newsetmedia">
        <div class="newsletterinscription">
            <h3>Inscrivez-vous à notre newsletter</h3>

            <form id="newsform" action="" method="POST" class="newsform">

                <input id="nlEmail" type="email" name="email" class="nlEmail" placeholder="Email" required="">

                <button id="nlSubmitBtn" type="submit" class="nl-input-form">
                    >
                </button>

                <p id="nlEmailError" class="error d-none" hidden>Email Invalide</p>
                <p id="nlEmailSuccess" class="error d-none" hidden>Votre inscription a bien été prise en
                    compte. Merci!</p>
            </form>
        </div>

        <!-- SOCIALMEDIA -->
        <div class="socialmedia">
            <h3>Suivez-nous sur les réseaux sociaux</h3>

            <div class="socialmediaicons">

                <div class="social">
                    <i class="fab fa-instagram fa-2x"></i>
                    <i class="fab fa-facebook-f fa-2x"></i>
                    <i class="fab fa-twitter fa-2x"></i>
                    <i class="fab fa-pinterest fa-2x"></i>
                    <i class="fab fa-flickr fa-2x"></i>
                </div>

            </div>

        </div>
    </div>

    <div class="ligne"></div>

    <!-- CHOOSE LANGUAGE -->
    <div class="language">
        <h3 class="title">Choose your language ></h3>
        <ul class="languages">

            <li class="english"><img src="./assets/icons/001-royaume-uni.svg" alt=""><a href="https://www.yellowkorner.com/en/home">English</a></li>

            <li class="français"><img src="./assets/icons/002-france.svg" alt=""><a href="https://www.yellowkorner.com/fr/home">Français</a></li>

            <li class="nederlands"><img src="./assets/icons/006-pays-bas.svg" alt=""><a href="https://www.yellowkorner.com/nl/home">Nederlands</a></li>

        </ul>
    </div>

    <!--MENTIONS LEGALES-->
    <div class="legal">

        <a href="https://www.yellowkorner.com/fr/mentions-legales-Mentions_Legales.html">Mentions
            légales</a>

        <a href="https://www.yellowkorner.com/fr/conditions-generales-dutilisation-Conditions_Utilisation.html">Conditions
            générales d'utilisation</a>

        <a href="https://www.yellowkorner.com/fr/mentions-legales-Mentions_Legales.html">Utilisation des
            cookies</a>

    </div>

</footer>