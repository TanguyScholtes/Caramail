<?php require 'config.php'; ?>
<?php require 'partials/header.php'; ?>

<section id="log-in">
    <div class="container-log">
        <img src="images/logo-plein.png" alt="Eclair" class="logo-plein"/>
        <form>
            <label for="uname">Username</label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw">Password</label>
            <input type="password" placeholder="Enter your password" name="psw" required>
            <button type="submit">Login</button>
        </form>
    </div>
</section>

<?php require 'partials/footer.php'; ?>
