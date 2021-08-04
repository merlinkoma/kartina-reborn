<?php
$title = 'Editer adresse de livraison';

$path = './../';
$paths = './';

require_once './../partials/header.php';

$street = $_POST['street'] ?? $_SESSION['user']['street'];
$zip = $_POST['zip'] ?? $_SESSION['user']['zip'];
$city = $_POST['city'] ?? $_SESSION['user']['city'];
$country = $_POST['country'] ?? $_SESSION['user']['country'];

$errors = [];

if (!empty($_POST)) {

    // if(strlen($street) < ) {
    //     $errors['street'] = ""
    // }

    if (strlen($zip) < 5) {
        $errors['zip'] = 'Le code postal n\'est pas correct';
    }

    if (strlen($city) < 2) {
        $errors['city'] = 'Le nom de la ville est trop court';
    }

    if (strlen($country) < 2) {
        $errors['country'] = 'Le nom du pays est trop court';
    }

    if (empty($errors)) {
        $query = $db->prepare('UPDATE user SET  street = :street,
                                                zip = :zip,
                                                city = :city,
                                                country = :country WHERE iduser = :iduser');
        $query->bindValue(':street', $street);
        $query->bindValue(':zip', $zip);
        $query->bindValue(':city', $city);
        $query->bindValue(':country', $country);
        $query->bindValue(':iduser', $_SESSION['user']['iduser']);

        $query->execute();

        header('Location: delivery-editing.php?success');
    }
}
?>

<div class="dashboard-delivery" style="display : flex">

    <?php require_once './../partials/dashboard.php'; ?>

    <div class="delivery-container">

        <div class="title">
            <h1>
                Editer l'adresse de livraison
            </h1>
        </div>

        <form action="" method="POST">
            <div class="space-between">
                <div>
                    <label for="street">Rue :</label>
                </div>
                <div>
                    <input type="text" name="street" id="street" value="<?= $street; ?>">
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="zip">Code postal</label>
                </div>
                <div>
                    <input type="text" name="zip" id="zip" value="<?= $zip; ?>">
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="city">Ville</label>
                </div>
                <div>
                    <input type="text" name="city" id="city" value="<?= $city; ?>">
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="country">Pays</label>
                </div>
                <div>
                    <input type="text" name="country" id="country" value="<?= $country; ?>">
                </div>
            </div>

            <div class="trait"></div>
            <div>
                <button>Appliquer</button>
            </div>

            <?php if (isset($_GET['success'])) { ?>
                <div class="validation">
                    Vos données ont été modifiées.
                </div>
            <?php } ?>
        </form>
    </div>
</div>

<?php require_once './../partials/footer.php'; ?>