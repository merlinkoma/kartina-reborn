    <?php
    $title = 'filtres';
    require_once './partials/header.php';
    require_once './partials/ariane.php';

    $allpictures = $db->query('SELECT * FROM picture ORDER BY RAND()')->fetchAll();
    ?>

    <div class="all-photographies">

        <aside class="filtrage">
            <h2>RECHERCHE PAR FILTRES</h2>
            <div class="orientation filter">
                <div class="filter-title">
                    Orientation
                    <div class="line"></div>
                </div>
                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>

            </div>

            <div class="formats filter">
                <div class="filter-title">
                    Formats
                    <div class="line"></div>
                </div>

                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>
                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>
                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>


            </div>

            <div class="prix filter">
                <div class="filter-title">
                    Prix
                    <div class="line"></div>
                </div>
                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>
            </div>

            <div class="themes filter">
                <div class="filter-title">
                    Thème
                    <div class="line"></div>
                </div>
                <a href="#">*sélection unique/ lien hypertext</a>
                <div class="line-link"></div>
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
                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>
                <div class="choice">
                    <input type="checkbox">
                    <label for="">*selection multiple/ checkbox*</label>
                </div>
                <div class="line"></div>
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

                foreach ($allpictures as $picture) { ?>

                    <div class="picture">
                        <img src="./assets/banqueimg/<?=$picture['cover']?>" alt="<?=$picture['title']?>">
                    </div>

                <?php } ?>
            </div>

            <div class="pagination">
                1
            </div>
        </div>

    </div>

    <?php require_once './partials/footer.php'; ?>

    </body>

    </html>