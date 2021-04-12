<?php
$title = 'Login';
ob_start();

require_once './partials/header.php';
require_once './partials/ariane.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$errors = [];

if (!empty($_POST)) {
    $query = $db->prepare(
        'SELECT * FROM user WHERE email = :email'
    );
    $query->bindValue(':email', $email);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        $errors['password'] = 'Email ou mot de passe incorrect';
    }
}

?>

<div class="user-login">
    <div class="head">
        <p>Mon compte client</p>
        <div class="ligne"></div>
    </div>

    <div class="blocs">

        <div class="left-bloc">
            <p>Déjà client</p>

            <div class="ligne"></div>

            <form method="post" class="connection-bloc">
                <label><span class="required">* </span>Adresse e-mail</label>
                <input type="email" name="email" placeholder="Adresse e-mail">

                <label><span class="required">* </span>Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe">

                <a href="mailto: ">Mot de passe oublié ?</a>

                    <?php if (isset($errors['password'])) {
                        echo '<div style="color: red">' . $errors['password'] . '</div>';
                    } ?>

                    <?php if (isset($errors['email'])) {
                        echo '<div style="color: red">' . $errors['email'] . '</div>';
                    } ?>

                <button id="connect-button">CONNEXION ></button>
            </form>
        </div>

        <div class="right-bloc">
            <p>Vous n'avez pas de compte Kartina</p>
            <p>Vous pouvez commander sans créer de compte. Vous pourrez créer votre compte plus tard.</p>
            <br>
            <button id="signup-button"><a href="./signup.php" id="create-account">CREER UN COMPTE ></button>
        </div>

    </div>

</div>

<?php require_once './partials/footer.php'; ?>

</body>

</html>