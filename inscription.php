<?php
require './partials/header.php';
?>
<style>
#form{
    margin-left: 45%;
    width: 150px;
    display: block;
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
<input type="text" required>
<label>Prenom</label>
<input type="text" required>
<label>age</label>
<input type="number">
<label>date Naissance</label>
<input type="date">
<label>Mot de passe</label>
<input type="password">
<label>Repeter mot de passe</label>
<input type="password">
</div>
</form>
</body>
