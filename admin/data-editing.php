<?php
$title = 'Données personnelles';

$path = './../';
$paths = './';

require_once './../partials/header.php';

$gender = $_POST['gender'] ?? $_SESSION['user']['gender'];
$firstname = $_POST['firstname'] ?? $_SESSION['user']['firstname'];
$lastname = $_POST['lastname'] ?? $_SESSION['user']['lastname'];
$email = $_POST['email'] ?? $_SESSION['user']['email'];
$phone = $_POST['phone'] ?? $_SESSION['user']['phone'];

$errors = [];

if (!empty($_POST)) {

    if (strlen($firstname) < 2) {
        $errors['firstname'] = 'Le prénom est trop court';
    }

    if (strlen($lastname) < 2) {
        $errors['lastname'] = 'Le nom est trop court';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email n\'est pas valide';
    }

    if (is_numeric(strlen($phone) < 10)) {
        $errors['phone'] = 'Le numéro est incorrect';
    }

    if (empty($errors)) {

        $query = $db->prepare('UPDATE user SET  gender = :gender, 
                                                firstname = :firstname,
                                                lastname = :lastname,
                                                phone = :phone WHERE iduser = :iduser');
        $query->bindValue(':gender', $gender);
        $query->bindValue(':firstname', $firstname);
        $query->bindValue(':lastname', $lastname);
        $query->bindValue(':phone', $phone);
        $query->bindValue(':iduser', $_SESSION['user']['iduser']);

        $query->execute();

        header('Location: data-editing.php?success');
        echo "<div class='validation'>Vos données ont été modifiées.</div>";
    }
}
?>

<div class="dashboard" style="display : flex">

    <?php require_once './../partials/dashboard.php'; ?>

    <div class="data-container">

        <div class="title">
            <h1>Editer mes données personnelles :</h1>
        </div>

        <form action="" method="POST">
            <div class="gender">
                <div>
                    <label for="gender">Mr</label>
                    <input type="radio" name="gender" id="Mr" value="Mr" <?php if ($gender == 'Mr') {
                                                                                echo 'checked';
                                                                            } ?>>
                </div>
                <div>
                    <label for="gender">Mme</label>
                    <input type="radio" name="gender" id="Mme" value="Mme" <?php if ($gender == 'Mme') {
                                                                                echo 'checked';
                                                                            } ?>>
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="firstname">Prénom :</label>
                </div>
                <div>
                    <input type="text" name="firstname" id="firstname" value="<?= $firstname; ?>">
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="lastname">Nom :</label>
                </div>
                <div>
                    <input type="text" name="lastname" id="lastname" value="<?= $lastname; ?>">
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="email">Email :</label>
                </div>
                <div>
                    <input type="text" name="email" id="email" value="<?= $email; ?>">
                </div>
            </div>

            <div class="space-between">
                <div>
                    <label for="phone">Téléphone :</label>
                </div>
                <div>
                    <input type="text" name="phone" id="phone" value="<?= $phone; ?>">
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