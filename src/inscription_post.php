<?php
require 'config.php';
$user = new User();

$user->createUser(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['mail']), password_hash($_POST['psw'], PASSWORD_DEFAULT));
$newUser = $user->getUserByMail( $_POST['mail'] );
try{
    $user->addUserToConversation( $newUser -> id, 1 );
} catch (Exception $e){
    die( $e -> getMessage() );
}

    header('Location: index.php');

    die();

?>
