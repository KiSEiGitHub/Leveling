<?php
session_start();

if(isset($_SESSION['pseudo'])) {
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
    <title>Connexion</title>
</head>
<body>
<form action="#" method="post">
    <label for="pseudo">
        <input type="text" name="pseudo" placeholder="Pseudo">
    </label>
    <label for="mdp">
        <input type="password" name="mdp" placeholder="Mot de passe">
    </label>
    <input type="submit" name="btn" value="Connexion">
</form>

<a href="inscription.php">Déjà un compte ? </a>
</body>
</html>

<?php

if(isset($_POST['btn'])) {
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $FakePseudo = $_POST['pseudo'];
        $FakePassword = $_POST['mdp'];

        $UserWhoWantToLogin = $controler->Login($FakePseudo);

        $_SESSION['pseudo'] = $UserWhoWantToLogin['pseudo'];
        $_SESSION['mdp'] = $UserWhoWantToLogin['password'];

        if($FakePseudo == $_SESSION['pseudo'] && md5($FakePassword) == $_SESSION['mdp']) {
            header('Location: index.php');
        } else {
            echo "<p>Mot de passe ou pseudo incorrect</p>";
        }

    } else {
        echo "<p>Renseigner les champs</p>";
    }
}

?>
