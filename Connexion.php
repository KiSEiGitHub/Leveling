<?php
session_start();

if (isset($_SESSION['pseudo'])) {
    header('Location: index.php');
}

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Leveling - Page de connexion</title>
    <link rel="stylesheet" href="scss/styles.css">
</head>

<body>

<main class="form-signin">
    <div class="sign-form">
        <form method="post" action="check.php">
            <img class="mb-4" src="./assets/img/website/leveling-logo.png" alt="" height="57">
            <h1 class="connexion">CONNEXION</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Pseudo" name="pseudo">
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="mdp">
            </div>

            <input type="submit" name="btn_Connexion" value="Se connecter">

            <div class="inscription">
                <span>Toujours pas inscrit ?&nbsp;</span>
                <a href="inscription.php">Inscription</a>
            </div>

            <p>&copy; 2022</p>
        </form>
    </div>
</main>
</body>

</html>