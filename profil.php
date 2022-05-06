<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("Config/controller.php");
$controler = new controller("localhost", "leveling", "root", "");
$user = $controler->getUser($_SESSION['id']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="./scss/styles.css">
    <title>Profil</title>
</head>
<body>
<nav>
    <img src="assets/img/website/leveling-logo.png" alt="azr">
</nav>

<!-- Donc sur la page profil il nous faut ça pour afficher les infos des user -->
<h3>prénom : <?= $user['prenom'] ?></h3>
<h3>nom : <?= $user['nom'] ?></h3>
<h3>pseudo : <?= $user['pseudo'] ?></h3>
<h3>bio : <?= $user['bio'] ?></h3>
<h3>age : <?= $user['age'] ?></h3>

<!-- le chemin de l'image doit être celui la exactement pareil pour chaque user -->
<img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp">


</body>
</html>