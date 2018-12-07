<?php
session_start();
require "Users.php";
$usermodel= new user;
$usermodel->disconnect();
header('Location: index.php');

?>