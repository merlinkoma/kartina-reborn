<?php
$title = 'Nouvelle vente';
require_once './partials/header.php';
require_once './partials/ariane.php';

$title = $_POST['title'] ?? '';
$cover = $_POST['cover'] ?? '';
$format = $_POST['format'] ?? '';
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

            if (!is_dir(__DIR__ . '/images')) {
                mkdir(__DIR__ . '/images');
            }

            $fileName = $_FILES['cover']['name'];
            $fileName = uniqid() . '-' . $fileName;

            move_uploaded_file($file, __DIR__ . '/images/' . $fileName);
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

    // if (empty($errors)) {
    //     $query = $db->prepare(
    //         'INSERT INTO picture (title, price, quantity, cover) VALUES (:title, :price, :quantity, :cover)'
    //     );
    //     $query->bindValue(':title', $title);
    //     $query->bindValue(':price', $price);
    //     $query->bindValue(':quantity', $quantity);
    //     $query->bindValue(':cover', $cover);

    //     $query->execute();
    // }
}
?>

<div class="container-new-sales">
    <div class="titre">
        <h1>Nouvelle vente :</h1>
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
                    <input type="file" name="cover" id="cover" value="<?= $cover; ?>" placeholder="Votre photo">
                    <?php if (isset($errors['cover'])) {
                        echo '<div style="color: red">' . $errors['cover'] . '</div>';
                    } ?>
                </div>
            </div>
            <div class="format">
                <div>
                    <label for="format">Choix du format : </label>
                </div>
                <div class="radio">
                    <input type="radio" name="format" id="format" value="<?= $format; ?>">Classique
                    <input type="radio" name="format" id="format" value="<?= $format; ?>">Grand
                    <input type="radio" name="format" id="format" value="<?= $format; ?>">Géant
                    <input type="radio" name="format" id="format" value="<?= $format; ?>">Collector
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
        </form>
    </div>
</div>

<?php require_once './partials/footer.php'; ?>
