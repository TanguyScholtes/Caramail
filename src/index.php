<?php
require 'config.php';
include 'partials/header.php';
?>
<section id="log-in">

    <div class="container-log">
        <img src="images/logo-plein.png" alt="Eclair" class="logo-plein"/>
        <form method="post" action="Login_traitement.php" name="formconnect">
            <label for="pseudo">Pseudo</label>
            <input type="text" placeholder="Enter Username" name="pseudo" required>
            <label for="psw">Password</label>
            <input type="password" placeholder="Enter your password" name="psw" required>
            <button type="submit">Login</button>
            <a href="Inscription.php" id="inscription">Inscris-toi!</a>
        </form>

    </div>
</section>
<?php
include 'partials/footer.php';
?>
