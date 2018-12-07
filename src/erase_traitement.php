<?php

require 'config.php';

$usermodel= new user;
$message = new Message();
$reaction = new Reaction();

$messages= $message-> getAllMessagesOfUser($_SESSION['id']);
foreach ($messages as $value) {
    $reaction -> deleteAllReactionsOfMessage( $value -> id );
}
    $message-> deleteAllMessagesOfUser($_SESSION['id']);

$usermodel->erase($_SESSION['id']);
$usermodel->disconnect();
header("Location: index.php");
die();
