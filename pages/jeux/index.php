<?php
session_start();

require_once("../../BackEnd/controller.php");
require_once("../../BackEnd/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

if (isset($_SESSION['pseudo'])) {
    $user = $controler->getUserById($_SESSION['id']);
} else {
    $user = null;
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Profil</title>
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <a href="../../index.php">
                <img src="../../images/leveling-logo.png" alt="leveling-logo">
            </a>
        </div>
        <div class="right">
            <label for="search">
                <input type="search" name="search">
            </label>
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $user->img ?>" class="nav-user" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>

<!-- main -->
<main id="games-block">
    <h1>TOUS LES JEUX</h1>
    <div id="AllGames">
        <?php
        $AllGames = $controler->getGames();
        foreach ($AllGames as $Games) {
            ?>
            <a href="OneGame.php?gameid=<?= $Games->idinsert_games ?>">
                <img src="../../assets/img/insert_games/pp/<?= $Games->img_pp ?>" alt="arza">
            </a>
        <?php } ?>
    </div>
</main>
</body>
</html>