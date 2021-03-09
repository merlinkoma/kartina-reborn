<?php
$title = 'aide';
require_once './partials/header.php';
require_once './partials/ariane.php';
?>

<div class="container-aide">
    <div class="container">
        <div class="formulaire">
            <form action="./validation.php" method="POST" name="formulaire">
                <section>

                    <section>
                        <div>
                            <label for="civilite">Civilité :</label>
                            <label for="Monsieur">M.</label><input type="radio" name="civ" value="Monsieur" checked>
                            <label for="Madame">Mme.</label><input type="radio" name="civ" value="Madame">
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="nom">Nom : </label>
                            </div>
                            <div>
                                <input type="text" name="lastname" class="write" required placeholder="Votre nom">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="prenom">Prénom : </label>
                            </div>
                            <div>
                                <input type="text" name="firstname" class="write" required placeholder="Votre prénom">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="mail">Adresse Email : </label>
                            </div>
                            <div>
                                <input type="email" name="mail" id="em" class="write" required placeholder="Votre Email">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <div>
                                <label for="tel">Téléphone : </label>
                            </div>
                            <div>
                                <input type="text" name="telephone" class="write" placeholder="Votre numéro de téléphone">
                            </div>
                        </div>
                    </section>

                </section>

                <section>

                    <section>
                        <div>
                            <div>
                                <label for="sujet">Sujet : </label>
                            </div>
                            <div>
                                <select name="sujet" id="subject">
                                    <option value="commander">Aider pour commander</option>
                                    <option value="echange">Après-vente, échange et retour</option>
                                    <option value="probleme">Problème technique</option>
                                    <option value="autres">Autres sujets</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div>
                            <textarea name="message" id="" cols="30" rows="10" maxlength="1000" required placeholder="Votre requête... (1000 lettres max)"></textarea>
                        </div>
                    </section>

                </section>

                <section>
                    <section>
                        <div>
                            <button type="submit" name="send" id="validation">Envoyer</button>
                        </div>
                    </section>
                </section>

            </form>
        </div>
    </div>
</div>


<?php require_once './partials/footer.php'; ?>

<script>
    document.getElementById("validation").addEventListener('click', function(e) {

        let f = document.formulaire;
        let i = 0;

        if (f.lastname.value == '') {
            console.log('Remplir le champ');
            f.lastname.style = "border: solid 1px red";
        } else {
            f.lastname.style = "border: solid 1px green";
            i += 1;
        }

        if (f.firstname.value == '') {
            console.log('Remplir le champ');
            f.firstname.style = "border: solid 1px red";
        } else {
            f.firstname.style = "border: solid 1px green";
            i += 1;
        }

        if (f.mail.value == '') {
            console.log('Remplir le champ');
            f.mail.style = "border: solid 1px red";
        } else {
            f.mail.style = "border: solid 1px green";
            i += 1;
        }

        if (f.message.value == '') {
            console.log('Remplir le champ');
            f.message.style = "border: solid 1px red";
        } else {
            f.message.style = "border: solid 1px green";
            i += 1;
        }

        if (i == 4) {
            console.log('Formulaire Ok');
        } else {
            e.preventDefault()
            alert('Votre formulaire n\'est pas complet');
        }
    });

    function remiseAZero(form) {
        f.lastname.value = '';
        f.firstname.value = '';
        f.mail.value = '';
        f.telephone.value = '';
    }
</script>
</body>

</html>