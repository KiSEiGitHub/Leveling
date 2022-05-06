<?php
session_start();

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

// Connexion
if (isset($_POST['btn_Connexion'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $FakePseudo = $_POST['pseudo'];
        $FakePassword = $_POST['mdp'];
        $UserWhoWantToLogin = $controler->Login($FakePseudo);

        $_SESSION['id'] = $UserWhoWantToLogin['id'];
        $_SESSION['pseudo'] = $UserWhoWantToLogin['pseudo'];
        $_SESSION['mdp'] = $UserWhoWantToLogin['password'];

        if ($FakePseudo == $_SESSION['pseudo'] && md5($FakePassword) == $_SESSION['mdp']) {
            var_dump('oui');
            header('Location: index.php');
        } else {
            header('Location: Connexion.php');
        }

    } else {
        header('Location: Connexion.php');
        echo "<p>Renseigner les champs</p>";
    }
}