<?php

require 'config.php';

$usermodel= new user;
$usermodel->erase($_SESSION['id']);
$usermodel->disconnect();
header("Location: index.php");
die;
