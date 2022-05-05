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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leveling - Page de connexion</title>

    <!--  CSS  -->
    <link rel="stylesheet" href="scss/styles.css">
</head>
<body>
<main class="form-signin">
    <div class="sign-form">
        <form method="post" action="#">
            <img class="mb-4" src="./assets/img/website/leveling-logo.png" alt="" height="57">
            <h1 class="connexion">CONNEXION</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Pseudo" name="pseudo">
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="mdp">
            </div>

            <input type="submit" name="btn" value="Se connecter">

            <div class="inscription">
                <span>Toujours pas inscrit ?&nbsp;</span>
                <a href="inscription.php">Inscription</a>
            </div>

            <p>&copy; 2022</p>

        </form>
        <?php

        if (isset($_POST['btn'])) {
            if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
                $FakePseudo = $_POST['pseudo'];
                $FakePassword = $_POST['mdp'];

                $UserWhoWantToLogin = $controler->Login($FakePseudo);

                $_SESSION['pseudo'] = $UserWhoWantToLogin['pseudo'];
                $_SESSION['mdp'] = $UserWhoWantToLogin['password'];

                if ($FakePseudo == $_SESSION['pseudo'] && md5($FakePassword) == $_SESSION['mdp']) {
                    header('Location: index.php');
                } else {
                    echo "<p>Mot de passe ou pseudo incorrect</p>";
                }

            } else {
                echo "<p>Renseigner les champs</p>";
            }
        }

        ?>

    </div>

</main>
</body>
</html>

