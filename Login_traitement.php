<?php
require "Users.php";
$usermodel=new user;
$psw= htmlspecialchars($_POST['psw']);
$pseudo=htmlspecialchars($_POST['pseudo']);
$usermodel->connect($psw, $pseudo);

header("Location: profile.php");
die;

