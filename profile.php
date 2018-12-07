<?php
session_start();
require "Users.php";
$usermodel= new User;
try{
    if (isset($_SESSION['id'])){
        $getid= intval($_SESSION['id']);
        $req= $usermodel->bdd->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($getid));
        $userinfo=$req->fetch();
    }
}
catch (PDOException $error) {
    die($error -> getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connecté</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 
</head>
<body>
<h1>Bienvenue</h1>
<h2>Profile de <?php echo $userinfo['pseudo'];?> <h2>
    <p>Pseudo: <?php echo $userinfo['pseudo'];?></p>
    <p>Prénom:<?php echo $userinfo['prenom'];?></p>
    <p>Nom:<?php echo $userinfo['nom'];?></p>
    <p>E-mail:<?php echo $userinfo['mail'];?></p>
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
     ?>
     <br>
     <a href="edit_profile.php">Editer mon profil</a>
     <?php   
    }
    ?>
    <button type="submit" onclick="document.location.href='erase.php'">Supprimer mon compte</button>
    <button type="submit" onclick="document.location.href='deconnexion.php'">DECONNEXION</button>
</body>
</html>