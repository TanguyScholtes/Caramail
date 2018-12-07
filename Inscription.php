<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscris-toi!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
    <?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
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
</body>
</html>

