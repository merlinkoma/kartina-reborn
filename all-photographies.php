    <?php
    $title = 'filtres';
    require_once './partials/header.php';
    require_once './partials/ariane.php';

    $allpictures = $db->query('SELECT * FROM picture ORDER BY RAND() LIMIT 24')->fetchAll();
    $orientations = $db->query('SELECT * FROM orientation')->fetchAll();
    $formats = $db->query('SELECT * FROM format')->fetchAll();
    $themes = $db->query('SELECT * FROM theme')->fetchAll();
    $keywords = $db->query('SELECT * FROM keyword')->fetchAll();
    ?>

    <div class="all-photographies">

        <aside class="filtrage">
            <h2>RECHERCHE PAR FILTRES</h2>
            <form class="choice" name="filtersform" method="GET">
                <!-- ORIENTATION -->
                <div class="orientation filter">
                    <div class="filter-title">
                        Orientation
                        <div class="line"></div>
                    </div>
                    <?php
                    foreach ($orientations as $orientation) { ?>
                        <div class="choicebloc">
                            <input type="checkbox" class="orientationcheck" name="orientation[]" value="<?= $orientation['idorientation'] ?>">
                            <label for="<?= $orientation['orientation_name'] ?>"><?= ucfirst($orientation['orientation_name']) ?></label>
                        </div>

                        <div class="line"></div>
                    <?php }
                    ?>
                </div>

                <!-- PRIX -->
                <div class="prix filter">
                    <div class="filter-title">
                        <div>Prix</div>
                        <div class="line"></div>
                    </div>

                    <div class="choicebloc">
                        <input type="radio" name="price" value="1" id="reset">Tous les prix</input>
                    </div>
                    <div class="line-link"></div>
                    <div class="choicebloc">
                        <input type="radio" name="price" value="50">Moins de 50 €</input>
                    </div>
                    <div class="line-link"></div>
                    <div class="choicebloc">
                        <input type="radio" name="price" value="50100">De 50€ à 100€</input>
                    </div>
                    <div class="line-link"></div>
                    <div class="choicebloc">
                        <input type="radio" name="price" value="100200">De 100€ à 200€</input>
                    </div>
                    <div class="line-link"></div>
                    <div class="choicebloc">
                        <input type="radio" name="price" value="200500">De 200€ à 500€</input>
                    </div>
                    <div class="line-link"></div>
                    <div class="choicebloc">
                        <input type="radio" name="price" value="500">Plus de 500€</input>
                    </div>
                    <div class="line-link"></div>
                </div>

                <!-- THEMES -->
                <div class="themes filter">
                    <div class="filter-title">
                        <div>Thème</div>
                        <div class="line"></div>
                    </div>
                    <div class="choicebloc">
                            <input type="radio" name="theme" value="1">Réinitialiser</input>
                        </div>
                        <div class="line-link"></div>
                    <?php
                    foreach ($themes as $theme) { ?>
                        <div class="choicebloc">
                            <input type="radio" name="theme" value="<?= $theme['theme_name'] ?>"><?= $theme['theme_name'] ?></input>
                        </div>
                        <div class="line-link"></div>
                    <?php }
                    ?>
                </div>

                <!-- FILTRES AVANCES -->
                <div class="others-filters filter">
                    <div class="filter-title">
                        <div>Filtrage avancé</div>
                        <input type="button" name="creation_date" value="">Réinitialiser les filtrages avancés
                        <div class="line"></div>
                    </div>
                    <div class="choicebloc">
                        <input type="radio" name="creation_date" value="date">Nouveautés</input>
                    </div>
                    <div class="line-link"></div>
                    <div class="choicebloc">
                        <a href="#">Derniers exemplaires</a>
                    </div>
                    <div class="line-link"></div>
                </div>

                <!-- div optionnelle -->
                <!-- <div class="keywords filter">
                    <div class="filter-title">
                        Recherche par mots-clefs
                        <div class="line"></div>
                    </div>
                    <?php
                    foreach ($keywords as $keyword) { ?>
                        <div class="choice">
                            <input type="checkbox" value="<?= $keyword['keyword_name'] ?>">
                            <label for="<?= $keyword['keyword_name'] ?>"><?= $keyword['keyword_name'] ?></label>
                        </div>
                        <div class="line"></div>
                    <?php }
                    ?>
                </div> -->
            </form>
        </aside>

        <div class="results-bloc">
            <div class="category">
                <h3>TRIER LES IMAGES PAR : </h3>
                <div id="tags"></div>
            </div>

            <div class="results">
                <!-- Affichage par défaut de toutes les images -->
                <?php foreach($allpictures as $picture){ ?>
                    <div class="vignette">
                    <figure>
                        <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>">
                    </figure>
                    <figcaption class="legende">
                        <a href="./pa-blocprev.php?id=<?= $picture['idpicture'] ?>"><?= $picture['title'] ?></a>
                        <p>A partir de <a href="./pa-blocprev.php?id=<?= $picture['idpicture'] ?>"><?= $picture['price'] ?></a>€</p>
                    </figcaption>
                </div>
               <?php } ?>
            </div>

            <div class="pagination">
            </div>
        </div>

    </div>

    <?php require_once './partials/footer.php'; ?>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./assets/js/filters.js"></script>
    </body>

    </html>