<?php

$title = 'Promotion';

$path = "./../";

require_once './../partials/header.php';
require_once './../partials/ariane.php';

$surname = $_POST['artist_name'] ?? $_SESSION['user']['artist_name'];

$errors = [];

if (!empty($_POST)) {

    if (strlen($surname) < 2) {
        $errors['artist_name'] = 'Le pseudo est trop court';
    }

    if (empty($errors)) {

        $query = $db->prepare('UPDATE user SET  artist_name = :artist_name,
                                                request = :request WHERE iduser = :iduser');
        $query->bindValue(':artist_name', $surname);
        $query->bindValue(':request', 1);
        $query->bindValue(':iduser', $_SESSION['user']['iduser']);
        
        $query->execute();
        
        header('Location: utilisateur-promotion.php?success');
    }
}

?>

<div class="dashboard-promotion" style="display : flex">
    <?php require_once './../partials/dashboard.php'; ?>

    <div class="container-promotion">
        <div class="titre">
            <h1>Passer une promotion :</h1>
        </div>

        <div class="choix">
            <div class="artist">
                <div>
                    <h3>Être un/une artiste ?</h3>
                </div>
                <div>
                    <form action="" method="POST">
                        <label for="artist_name">Nom d'artiste :</label>
                        <input type="text" name="artist_name" id="artist_name" value="<?= $surname;?>">
                        <button value="1">Envoyer</button>
                    </form>
                </div>
                <p>*Une requête sera envoyé vers l'un de nos administrateurs pour vérifier votre authenticitée. Attente estimé : 48h*</p>
            </div>
            <?php if (isset($_GET['success'])) { ?>
                <div class="validation">
                    Votre requête a été envoyée
                </div>
            <?php } ?>
        </div>
    </div>

</div>

<?php require_once './../partials/footer.php'; ?>