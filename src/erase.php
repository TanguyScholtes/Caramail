<?php
require 'config.php';
include 'partials/header.php';
?>
  <p>Êtes vous sur de vouloir supprimer votre profil?</p>
  <button type="submit" onclick="document.location.href= 'profile.php'">Annuler</button>
  <button type="submit" onclick="document.location.href='erase_traitement.php'">Confirmer</button>
<?php include 'partials/footer.php';?>
