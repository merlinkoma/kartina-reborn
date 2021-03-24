<?php
require './partials/header.php';
if( !empty($_POST)){
    if (!empty($_POST['name'])&& !empty($_POST['firstname']) && !empty($_POST['age'])&& !empty($_POST['motDePasse'])){
                $errors=[];
                $password=$_POST['motDePasse'];
                $cf_password=$_POST['cf_password'];
                $email=$_POST['email'];
                $prenom=$_POST['firstname'];
                $age=$_POST['age'];
                $nom=$_POST['name'];
                $adresse=$_POST['adresse'];

                if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    $errors['email']="l'email n'est pas valide";
                    echo $errors['email'];
                }
                if(strlen($password)<6){
                    $errors['motDePasse']="le mot de passe est trop court ";
                    echo $errors['motDePasse'];
                }
                if($password!=$cf_password){
                    $errors['erreurequalpassword']="les mots de passes sont différent ";
                    echo $errors['erreurequalpassword'];
                }
                try{
                $db = new PDO('mysql:host=localhost;dbname=kartina;charset=utf8', 'root', '');
                $query =$db->prepare('INSERT INTO client (email ,firstname , lastname ,adresse, password) VALUES (:email , :firstname, :lastname,:adress:password)');
                $query->bindValue(':password', password_hash($password,PASSWORD_DEFAULT));
                $query->bindValue(':email',$email);
                $query->bindValue(':firstname',$prenom);
                $query->bindValue(':lastname' , $nom);
                $query->bindValue(':adress', $adresse);
                $query->execute();
                }
                catch(Exception $e){
                    echo $e->getMessage();
                }

    }
    echo '<ul>';
    foreach($errors as $error){
        echo '<li>'.$error.'</li>';
    }
    echo '</ul>' ;

}
?>
<style>
#form{
    margin-left: 40%;
    width: 200px;
    display: block;
    height: auto;
    width: 100%;
     font-family: Oswald;
     font-size: 1.5em;
    color: #e7e7e7;
    }
label{
        width: 100px;
        display: block;
    }
input{
        width: 120px ;
    }
</style>
<body>
<form action="" method="POST">
<div id="form">
    <label>Nom</label>
        <input type="text" name="name" >
        <label>Prenom</label>
        <input type="text" name="firstname">
        <label>email</label>
        <input type="email" name="email">
        <label>adresse</label>
        <input type="text" name="adresse">
        <label>age</label>
        <input type="number" name="age">
        <label>Mot de passe</label>
        <input type="password" name="motDePasse">
        <label>Repeter mot de passe</label>
        <input type="password" name="cf_password">
        <br>
        <button type="submit">Envoyer</button>
</div>
    
</form>
</body>
