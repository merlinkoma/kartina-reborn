<?php
require './partials/header.php';
if( !empty($_POST)){
    if (!empty($_POST['name'])&& !empty($_POST['firstname']) && !empty($_POST['age'])&& !empty($_POST['motDePasse'])){
            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    echo 'l\'adresse email est validée' ; 
            }
    }

}
?>
<style>
#form{
    margin-left: 45%;
    width: 200px;
    display: block;
    height: auto;
    width: 100%;
     font-family: Oswald;
     font-size: 1.5em;
    color: #e7e7e7;
    }
label{
        width: 90px;
        display: block;
    }
input{
        width: 100px ;
    }
</style>
<body>
<form action="">
<div id="form">
<label>Nom</label>
<input type="text" name="name" required>
<label>Prenom</label>
<input type="text" name="firstname" required>
<label>email</label>
<input type="email" name="email">
<label>age</label>
<input type="number" name="age">
<label>date Naissance</label>
<input type="date" name="birthday">
<label>Mot de passe</label>
<input type="password" name="motDePasse">
<label>Repeter mot de passe</label>
<input type="password" name="motDePasse">
</div>
</form>
</body>
