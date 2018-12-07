

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Oufti!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
<section id="log-in">
    
    <div class="container-log">
        <img src="images/logo-plein.png" alt="Eclair" class="logo-plein"/>
        <form method="post" action="Login_traitement.php" name="formconnect">
            <label for="pseudo">Pseudo</label>
            <input type="text" placeholder="Enter Username" name="pseudo" required>
            <label for="psw">Password</label>
            <input type="password" placeholder="Enter your password" name="psw" required>
            <button type="submit">Login</button>
            <a href="Inscription.php" target="_blank" id="inscription">Inscris-toi!</a>
        </form>
        
    </div>
</section>  
</body>
</html>
