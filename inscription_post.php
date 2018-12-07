<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
require "Users.php";
$user= new User;
$user->createUser(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['mail']), password_hash($_POST['psw'], PASSWORD_DEFAULT));
    header('Location: index.php');
   
    die();

?>