<?php

require 'config.php';

$usermodel= new user;
$usermodel->disconnect();
header('Location: index.php');
die();
?>
