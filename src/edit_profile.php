<?php

require 'config.php';

if(isset($_SESSION['id']))
{
    $usermodel= new User;
    $user = $usermodel -> getUser( $_SESSION['id'] );
    if(isset($_POST['newpseudo']) && $_POST['newfirstname'] && $_POST['newname'] && $_POST['newmail']){
        if(isset($_POST['newpsw'])){
            if($_POST['newpsw']==$_POST['newpsw2']){
                $newpsw= password_hash($_POST['newpsw'], PASSWORD_DEFAULT);
            }
        }
        else{
            $newpsw= $user['password'];
        }
        $newpseudo= htmlspecialchars($_POST['newpseudo']);
        $newfirstname=htmlspecialchars($_POST['newfirstname']);
        $newname=htmlspecialchars($_POST['newname']);
        $newmail=htmlspecialchars($_POST['newmail']);
        $usermodel->edit($_SESSION['id'], $newpseudo, $newname,$newfirstname, $newmail, $newpsw);
        header('Location: profile.php?id='.$_SESSION['id']);
        die;
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connecté</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="style.css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>

<h2>Editer mon profil<h2>
<form method="POST" action="">
    <label>Pseudo</label>
    <input type="text" name="newpseudo" placeholder="Pseudo" value=<?php echo $user -> pseudo;?>> <br>
    <label>Prénom</label>
    <input type="text" name="newfirstname" placeholder="Prénom" value=<?php echo $user -> prenom;?>> <br>
    <label>Nom</label>
    <input type="text" name="newname" placeholder="Nom" value=<?php echo $user -> nom;?>> <br>
    <label>E-Mail</label>
    <input type="text" name="newmail" placeholder="E-mail" value=<?php echo $user -> mail;?>> <br>
    <label>Mot de passe</label>
    <input type="password" name="newpsw" placeholder="Mot de passe"/> <br>
    <input type="hidden" name="pswold" value="<?php echo $user-> password;?>"/>
    <label>Confirmer mot de passe</label>
    <input type="password" name="newpsw2" placeholder="Confirmer mot de passe"/> <br>
   <input type="submit" value="Editer"/> <br><br>
</form>
<button type="submit" onclick="document.location.href='deconnexion.php'">DECONNEXION</button>
</body>
</html>
<?php
}
else{
    header("Location: index.php");
}

?>
