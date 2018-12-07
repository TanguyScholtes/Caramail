<?php 
session_start();
require "Users.php";
$usermodel= new user;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supprimer mon profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
  <p>Êtes vous sur de vouloir supprimer votre profil?</p>
  <button type="submit" onclick="document.location.href= 'profile.php'">Annuler</button>
  <button type="submit" onclick="document.location.href='erase_traitement.php'">Confirmer</button>
</body>
</html>
