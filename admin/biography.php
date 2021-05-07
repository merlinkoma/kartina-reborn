<?php

$title = 'Biographie';

$path = "./../";

require_once './../partials/header.php';
require_once './../partials/ariane.php';

$biography = $_POST['artist_description'] ?? $_SESSION['user']['artist_description'];

$query = $db->prepare('UPDATE user SET artist_description = :artist_description WHERE iduser = :iduser');
$query->bindValue(':artist_description', $biography);
$query->bindValue(':iduser', $_SESSION['user']['iduser']);

$query->execute();

?>

<div class="dashboard-biography" style="display : flex;">
    <?php require_once './../partials/dashboard.php'; ?>

    <div class="container-biography">
        <div class="title">
            <h1>Biographie :</h1>
        </div>

        <div class="biography">
            <p><?= $_SESSION['user']['artist_description']; ?></p>
        </div>
        <form action="" method="POST">
            <div>
                <textarea name="artist_description" id="artist_description" cols="100" rows="20" value="<?= $biography; ?>"><?= $_SESSION['user']['artist_description']; ?></textarea>
            </div>
            <button>Modifier</button>
        </form>
    </div>
</div>

<?php require_once './../partials/footer.php'; ?>