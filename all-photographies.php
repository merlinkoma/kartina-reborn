    <?php
    $title = 'filtres';
    require_once './partials/header.php';
    require_once './partials/ariane.php';

    $allpictures = $db->query('SELECT * FROM picture ORDER BY RAND()')->fetchAll();
    $orientations = $db->query('SELECT * FROM orientation')->fetchAll();
    $formats = $db->query('SELECT * FROM format')->fetchAll();
    $themes = $db->query('SELECT * FROM theme')->fetchAll();
    $keywords = $db->query('SELECT * FROM keyword')->fetchAll();

   ?>

    <div class="all-photographies">

        <aside class="filtrage">
            <h2>RECHERCHE PAR FILTRES</h2>
            <div class="orientation filter">
                <div class="filter-title">
                    Orientation
                    <div class="line"></div>
                </div>
                <form class="choice" name="orientationform" method="GET">
                    <?php
                    foreach ($orientations as $orientation) { ?>
                    <div class="choicebloc">                  
                        <input type="checkbox" class="orientationcheck" name="orientation[]" value="<?= $orientation['idorientation'] ?>">
                        <span class="check"></span>
                        <label for="<?= $orientation['orientation_name'] ?>"><?= $orientation['orientation_name'] ?></label>
                    </div>

                        <div class="line"></div>
                    <?php }
                    ?>
                </form>
            </div>

            <div class="formats filter">
                <div class="filter-title">
                    Formats
                    <div class="line"></div>
                </div>
                <?php
                foreach ($formats as $format) { ?>
                    <div class="choice">
                        <input type="checkbox" value="<?= $format['format_name'] ?>">
                        <label for="<?= $format['format_name'] ?>"><?= $format['format_name'] ?></label>
                    </div>
                    <div class="line"></div>
                <?php }
                ?>
            </div>

            <div class="prix filter">
                <div class="filter-title">
                    Prix
                    <div class="line"></div>
                </div>

                <div class="choice">
                    <a href="#">Moins de 50 €</a>
                </div>
                <div class="choice">
                    <a href="#">De 50€ à 100€</a>
                </div>
                <div class="choice">
                    <a href="#">De 100€ à 200€</a>
                </div>
                <div class="choice">
                    <a href="#">De 200€ à 500€</a>
                </div>
                <div class="choice">
                    <a href="#">Plus de 500€</a>
                </div>

                <div class="line"></div>
            </div>

            <div class="themes filter">
                <div class="filter-title">
                    Thème
                    <div class="line"></div>
                </div>
                <?php
                foreach ($themes as $theme) { ?>
                    <div class="choice">
                        <a href="#"><?= $theme['theme_name'] ?></a>
                    </div>
                    <div class="line-link"></div>
                <?php }
                ?>
            </div>

            <div class="others-filters filter">
                <div class="filter-title">
                    Filtrage avancé
                    <div class="line"></div>
                </div>
                <a href="#">Nouveautés</a>
                <div class="line-link"></div>
                <a href="#">Derniers exemplaires</a>
                <div class="line-link"></div>
            </div>

            <!-- div optionnelle -->
            <div class="keywords filter">
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
            </div>
        </aside>

        <div class="results-bloc">
            <div class="category">
                <h3>Nom du filtrage choisi</h3>
                <p class="presentation">
                    Présentation de la catégorie choisie.
                </p>
            </div>

            <div class="results">
                <?php

                /*foreach ($allpictures as $picture) { ?>

                    <div class="picture">
                        <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['title'] ?>">
                    </div> 

                <?php } */ ?>
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