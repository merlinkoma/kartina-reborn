<?php
$title = 'Nouvelle vente';

$path = './../';
$paths = './';

require_once './../partials/header.php';
// require_once './../partials/ariane.php';

$title = $_POST['title'] ?? '';
$cover = $_POST['cover'] ?? '';
$format = $_POST['format'] ?? '';
$orientation = $_POST['orientation'] ?? '';
$price = $_POST['price'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$tag = $_POST['tag'] ?? '';

$errors = [];

$allowedTypes = ['image/jpeg', 'image/png'];

if (!empty($_POST)) {
    if (iconv_strlen($title) < 2) {
        $errors['title'] = 'Le titre est trop court';
    }

    if (!empty($_FILES['cover'])) {
        if ($_FILES['cover']['error'] === 0 && in_array($_FILES['cover']['type'], $allowedTypes)) {
            $file = $_FILES['cover']['tmp_name'];

            if (!is_dir(__DIR__ . './../assets/banqueimg')) {
                mkdir(__DIR__ . './../assets/banqueimg');
            }

            $fileName = $_FILES['cover']['name'];
            $fileName = uniqid() . '-' . $fileName;

            move_uploaded_file($file, __DIR__ . './../assets/banqueimg/' . $fileName);
        } else {
            $errors['cover'] = 'Veuillez envoyer un fichier au bon format (jpg, jpeg, png)...';
        }
    }

    if ($price < 0) {
        $errors['price'] = "Le prix doit être supérieur à 0€...";
    }

    if ($quantity < 1 && $quantity > 1000) {
        $errors['quantity'] = "Le nombre doit etre compris entre 1 et 1000.";
    }
    


    if (empty($errors)) {


        $cover = str_replace('è', 'e', $fileName);
        $cover = str_replace('é', 'e', $cover);
        $cover = str_replace('å', 'a', $cover);
        $cover = str_replace('à', 'a', $cover);
        $cover = str_replace('â', 'a', $cover);
        $cover = str_replace('ö', 'o', $cover);
        $cover = str_replace("'", '-', $cover);
        $cover = str_replace(' ', '-', $cover);
        $cover = str_replace('…', 'x', $cover);
        $cover = strtolower($cover);

        $query = $db->prepare(
            'INSERT INTO picture (title, price, quantity, orientation_idorientation, user_iduser, cover) VALUES (:title, :price, :quantity, :orientation, :user_iduser, :cover)'
        );
        $query->bindValue(':title', $title);
        $query->bindValue(':price', $price);
        $query->bindValue(':quantity', $quantity);
        $query->bindValue(':orientation', $orientation);
        $query->bindValue(':user_iduser', $_SESSION['user']['iduser']);
        $query->bindValue(':cover', $cover);

        $query->execute();

        header('Location: new-sales.php?success');
    }
}
?>

<div class="dashboard-new-sales" style="display : flex">
    <?php require_once './../partials/dashboard.php'; ?>
    
    <div class="container-new-sales">
        <h1>Bonjour <?= $_SESSION['user']['artist_name']; ?></h1>
        
        <div class="titre">
            <h2>Nouvelle vente :</h2>
        </div>

        <div class="formulaire">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="title">
                    <div>
                        <label for="title">Titre de l'œuvre : </label>
                    </div>
                    <div>

                        <input type="text" name="title" id="title" value="<?= $title; ?>" placeholder="Votre titre">
                        <?php if (isset($errors['title'])) {
                            echo '<div style="color: red">' . $errors['title'] . '</div>';
                        } ?>
                    </div>
                </div>
                <div class="cover">
                    <div>
                        <label for="cover">Choisissez une photo à vendre : </label>
                    </div>
                    <div>
                        <input type="file" name="cover" id="cover" placeholder="Votre photo">
                        <?php if (isset($errors['cover'])) {
                            echo '<div style="color: red">' . $errors['cover'] . '</div>';
                        } ?>
                    </div>
                </div>

                <!-- <div class="format">
                    <div>
                        <label for="format">Choix du format : </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="format" id="format" value="<?= $format; ?>">Classique
                        <input type="radio" name="format" id="format" value="<?= $format; ?>">Grand
                        <input type="radio" name="format" id="format" value="<?= $format; ?>">Géant
                        <input type="radio" name="format" id="format" value="<?= $format; ?>">Collector
                    </div>
                </div> -->

                <div class="orientation">
                    <div>
                        <label for="orientation">Choix de l'orientation : </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="orientation" id="orientation" value="1">Portrait
                        <input type="radio" name="orientation" id="orientation" value="2">Paysage
                        <input type="radio" name="orientation" id="orientation" value="3">Carré
                        <input type="radio" name="orientation" id="orientation" value="4">Panoramique
                    </div>
                </div>

                <div class="price">
                    <div>
                        <label for="price">Prix à la vente : </label>
                    </div>
                    <div>
                        <input type="number" name="price" id="price" min="0" value="<?= $price; ?>" placeholder="Votre prix">€
                        <?php if (isset($errors['price'])) {
                            echo '<div style="color: red">' . $errors['price'] . '</div>';
                        } ?>
                    </div>
                </div>
                <div class="quantity">
                    <div>
                        <label for="quantity">Nombre de tirages maximum pour la photographie : </label>
                    </div>
                    <div>
                        <input type="number" name="quantity" id="quantity" min="1" value="<?= $quantity; ?>" placeholder="Votre quantité">
                        <?php if (isset($errors['quantity'])) {
                            echo '<div style="color: red">' . $errors['quantity'] . '</div>';
                        } ?>
                    </div>
                </div>
                <div class="tag">
                    <div>
                        <label for="tag">Ajouter un tags à la photographie : </label>
                    </div>
                    <div>
                        <input type="text" name="tag" id="tag" value="<?= $tag; ?>" placeholder="Votre tag">
                    </div>
                </div>
                <div class="validation">
                    <button>Validation</button>
                </div>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="validation">
                        Votre vente a été crée.
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php require_once './../partials/footer.php'; ?>