<?php
require 'config.php';
include 'partials/header.php';
?>
 <div id="container-inscription">
 <form class="form-sub" action="inscription_post.php" method="post">
        <div class="form-name">
            <label for="pseudo"><p>Pseudo :</p></label>
            <input class="form-inscription"type="text" placeholder="Enter Username" name="pseudo" id="pseudo" required>
            <label for="prenom"><p>Prénom :</p></label>
            <input class= "form-inscription"type="text" placeholder="Entrez votre prénom" name="prenom" id="prenom"required>
            <label for="nom"><p>Nom :</p></label>
            <input class= "form-inscription" type="text" placeholder="Entrez votre nom" name="nom"id="nom" required>
        </div>
        <div class="form-mail">
            <label for="mail"><p>E-mail :</p></label>
            <input class= "form-inscription" type="text" placeholder="Entrez votre e-mail" name="mail" id="mail"required>
            <label for="confirm"><p>Confirmation :</p></label>
            <input class= "form-inscription" type="text" placeholder="Retapez votre e-mail" name="confirm" required>
        </div>
        <div class="form-pass">
            <label class="label-form" for="psw"><p>Mot de passe : </p></label>
            <input class= "form-inscription" type="password" placeholder="Enter your password" name="psw" id="psw"required>
            <label class="label-form" for="psw2"><p>Confirmation : </p></label>
            <input class= "form-inscription" type="password" placeholder="Retapez votre mot de passe" name="psw2" required>
        </div>
        <button type="submit">Send!</button>

        </form>
 </div>
<?php include 'partials/footer.php'; ?>
