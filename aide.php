<?php
$title = 'aide';
require_once './partials/header.php';
require_once './partials/ariane.php';

$gender = $_POST['gender'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$subject = $_POST['subject'] ?? '';

$errors = [];

if (!empty($_POST)) {
    if (iconv_strlen($lastname) <= 2) {
        $errors['lastname'] = 'Le nom est trop court';
    }

    if (iconv_strlen($firstname) <= 2) {
        $errors['firstname'] = 'Le prénom est trop court';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email n\'est pas valide';
    }

    if ($subject === '') {
        $errors['subject'] = 'Le sujet n\'est pas valide';
    }

    if (iconv_strlen($message) < 15) {
        $errors['message'] = 'Le message est trop court';
    }
}
?>

<div class="container-aide">
    <div class="container">
        <div class="formulaire">
            <form action="./validation.php" method="POST" name="formulaire">
                <section>

                    <section>
                        <div>
                            <label for="gender">Civilité :</label>
                            <label for="Monsieur">M.</label><input type="radio" name="gender" id="gender" value="Monsieur" value="<?= $gender; ?>" checked>
                            <label for="Madame">Mme.</label><input type="radio" name="gender" id="gender" value="Madame" value="<?= $gender; ?>">
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="lastname">Nom : </label>
                            </div>
                            <div>
                                <input type="text" name="lastname" id="lastname" class="write <?= isset($errors['lastname']) ? 'invalid' : ''; ?>" required placeholder="Votre nom" value="<?= $lastname; ?>">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="firstname">Prénom : </label>
                            </div>
                            <div>
                                <input type="text" name="firstname" id="firstname" class="write <?= isset($errors['firstname']) ? 'invalid' : ''; ?>" required placeholder="Votre prénom" value="<?= $firstname; ?>">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="email">Adresse Email : </label>
                            </div>
                            <div>
                                <input type="email" name="email" id="email" class="write <?= isset($errors['email']) ? 'invalid' : ''; ?>" required placeholder="Votre Email" value="<?= $email; ?>">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="phone">Téléphone : </label>
                            </div>
                            <div>
                                <input type="text" name="phone" id="phone" class="write" placeholder="Votre numéro de téléphone" value="<?= $phone; ?>">
                            </div>
                        </div>
                    </section>

                </section>

                <section>

                    <section>
                        <div>
                            <div>
                                <label for="subject">Sujet : </label>
                            </div>
                            <div>
                                <select name="subject" id="subject" class="<?= isset($errors['subject']) ? 'invalid' : ''; ?>">
                                    <option value="">Choisir le sujet</option>
                                    <option value="commander" <?= $subject === 'commander' ? 'selected' : ''; ?>>Aider pour commander</option>
                                    <option value="echange" <?= $subject === 'echange' ? 'selected' : ''; ?>>Après-vente, échange et retour</option>
                                    <option value="probleme" <?= $subject === 'probleme' ? 'selected' : ''; ?>>Problème technique</option>
                                    <option value="autres" <?= $subject === 'autres' ? 'selected' : ''; ?>>Autres sujets</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <textarea name="message" id="message" cols="30" rows="10" maxlength="1000" class="<?= isset($errors['message']) ? 'invalid' : ''; ?>" required placeholder="Votre requête... (1000 lettres max)"></textarea>
                        </div>
                    </section>

                </section>

                <section>
                    <section>
                        <div>
                            <button type="submit" name="send" id="send">Envoyer</button>
                        </div>
                    </section>
                </section>

            </form>
        </div>
    </div>
</div>


<?php require_once './partials/footer.php'; ?>

<script>
    // document.getElementById("send").addEventListener('click', function(e) {

    //     let f = document.formulaire;
    //     let i = 0;

    //     if (f.lastname.value == '') {
    //         console.log('Remplir le champ');
    //         f.lastname.style = "border: solid 1px red";
    //     } else {
    //         f.lastname.style = "border: solid 1px green";
    //         i += 1;
    //     }

    //     if (f.firstname.value == '') {
    //         console.log('Remplir le champ');
    //         f.firstname.style = "border: solid 1px red";
    //     } else {
    //         f.firstname.style = "border: solid 1px green";
    //         i += 1;
    //     }

    //     if (f.email.value == '') {
    //         console.log('Remplir le champ');
    //         f.email.style = "border: solid 1px red";
    //     } else {
    //         f.email.style = "border: solid 1px green";
    //         i += 1;
    //     }

    //     if (f.message.value == '') {
    //         console.log('Remplir le champ');
    //         f.message.style = "border: solid 1px red";
    //     } else {
    //         f.message.style = "border: solid 1px green";
    //         i += 1;
    //     }

    //     if (i == 4) {
    //         console.log('Formulaire Ok');
    //     } else {
    //         e.preventDefault()
    //         alert('Votre formulaire n\'est pas complet');
    //     }
    // });

    // function remiseAZero(form) {
    //     f.lastname.value = '';
    //     f.firstname.value = '';
    //     f.mail.value = '';
    //     f.telephone.value = '';
    // }
</script>
</body>

</html>