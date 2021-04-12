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
        if ($_FILES['cover']['errors'] === 0 && in_array($_FILES['cover']['type'], $allowedTypes)) {
            $file = $_FILES['cover']['tmp_name'];

            if (!is_dir(__DIR__ . '/images')) {
                mkdir(__DIR__ . '/images');
            }

            $fileName = $_FILES['cover']['name'];
            $fileName = uniqid() . '-' . $fileName;

            move_uploaded_file($file, __DIR__ . '/images/' . $fileName);
        } else {
            echo 'Veuillez envoyer un fichier au bon format (jpg, jpeg, png)...';
        }
    }

    if ($quantity < 1 && $quantity > 1000) {
        $errors['number'] = "Le nombre doit etre compris entre 1 et 1000.";
    }

    if (empty($errors)) {
        $query = $db->prepare(
            'INSERT INTO picture (title, price, quantity, cover) VALUES (:title, :price, :quantity, :cover)'
        );
        $query->bindValue(':title', $title);
        $query->bindValue(':price', $price);
        $query->bindValue(':quantity', $quantity);
        $query->bindValue(':cover', $cover);

        $query->execute();
    }
}
?>

<div class="container-new-sales">
    <div class="titre">
        <h1>Nouvelle vente</h1>
    </div>

    <div class="formulaire">
        <form action="" method="POST">
            <div class="title">
                <label for="title">Titre de l'œuvre : </label>
                <input type="text" name="title" id="title" value="<?= $title; ?>">
            </div>
            <div class="cover">
                <label for="cover">Choisissez une photo à vendre : </label>
                <input type="file" name="cover" id="cover" value="<?= $cover; ?>">
            </div>
            <div class="format">
                <label for="format">Choix du format : </label>
                <input type="radio" name="format" id="format" value="<?= $format; ?>">Classique
                <input type="radio" name="format" id="format" value="<?= $format; ?>">Grand
                <input type="radio" name="format" id="format" value="<?= $format; ?>">Géant
                <input type="radio" name="format" id="format" value="<?= $format; ?>">Collector
            </div>
            <div class="price">
                <label for="price">Prix à la vente : </label>
                <input type="number" name="price" id="price" value="<?= $price; ?>">
            </div>
            <div class="quantity">
                <label for="quantity">Nombre de tirages maximum pour la photographie : </label>
                <input type="number" name="quantity" id="quantity" value="<?= $quantity; ?>">
            </div>
            <div class="tag">
                <label for="tag">Ajouter un tags à la photographie : </label>
                <input type="text" name="tag" id="tag" value="<?= $tag; ?>">
            </div>
            <div class="validation">
                <button type="button">Validation</button>
            </div>
        </form>
    </div>
</div>