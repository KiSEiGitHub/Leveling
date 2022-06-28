<?php
session_start();

// import des cosntante
require '../../constante.php';

require '../../BackEnd/modele.php';

// instanciation
$modele = new modele(HOST, DB, USER, MDP);

if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

$user = null;

if (isset($_SESSION['id'])) {
    $user = $modele->doubleJointure(
        'tblUsers',
        'tblAboutUsers',
        'PK_Users',
        'FK_Users_AboutUsers',
        'fetch',
        (int)$_SESSION['id']
    );
}

extract((array)$user);

$ranks = $modele->getLvl($UQ_Users_Level);
?>

<!DOCTYPE html>
<html lang="en">

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
    <title>Jeux</title>
</head>

<body>
<!--Image de couverture DEBUT -->
<style>
    #cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/UserProfilBanner/<?= $UQ_Users_ImgBanner ?>");
        height: 250px;
    }
</style>
<!--Image de couverture FIN -->

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
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="border: none; outline: none; background: none;">
                    <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" class="nav-user"
                         alt="pfp" style="width: 40px; border-radius: 50%;">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="../settings/index.php">Paramètres</a></li>
                    <li><a class="dropdown-item" href="../../Deconnexion.php">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Nav Fin -->

<main>
    <div class="profil-grid">
        <div id="cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h1 class="title white">@ <?= $UQ_Users_Pseudo ?></h1>
                </div>
                <div class="li">
                    <ul>
                        <li>
                            <a href="index.php">Description</a>
                        </li>
                        <li>
                            <a href="jeux.php">Jeux</a>
                        </li>
                        <li>
                            <a href="groupes.php">Groupes</a>
                        </li>
                        <li>
                            <a href="amis.php">Amis</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bio">
                <span class="bold">Bio :</span>
                <span class="bold"><?= $UQ_Users_Bio ?></span>
            </div>
        </div>
        <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" alt="pfp" id="pp">
        <?php
        if ($ranks === null) {
            echo "<p>No ranks</p>";
        } else {

            ?>
            <img id="lvl-icon" src="../../<?= $ranks[0] ?>" alt="rank" width="65px">
            <img id="lvl-rank" src="../../<?= $ranks[1] ?>" alt="ranks" width="400px">
        <?php } ?>
    </div>

    <!--  Jeux fav  -->
    <div class="bottom" style="padding: 20px">
        <h2 class="sous-title bold"><?= $UQ_AboutUsers_JeuFav ?></h2>
        <h3 class="header-title bold">269h</h3>
    </div>
    <!--  Jeux fav  -->

    <!--  Gallerie  -->
    <section id="gallerie" class="UserGames">
        <h4 class="sous-title grey bold center">GALLERIE</h4>
        <div class="Games">
            <?php
            $userGames = $modele->findById('tblUserGames', 'FK_Users_UserGames', $_SESSION['id'], 'all');
            if ($userGames == null) {
                echo "<p style='color: #b7b7b7; font-weight: 800; font-size: 24px'>Vous n'avez aucun jeu</p>";
            } else {
                foreach ($userGames as $userGame) {
                    $Jeux = $modele->findById('tblGames', 'PK_Games', $userGame->FK_Games_UserGames, 'fetch');
                    ?>
                    <div class="enfant">
                        <a href="../jeux/OneGame.php?gameid=<?= $Jeux->PK_Games ?>">
                            <img src="../../assets/img/insert_games/pp/<?= $Jeux->UQ_Games_Img ?>" alt="">
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
    </section>
    <!--  Gallerie  -->

    <!--  Souhait  -->
    <section id="gallerie" class="UserGames">
        <h4 class="sous-title grey bold center">Liste de souhaits</h4>
        <div class="Games">
            <?php
            $userWishs = $modele->findById('tblUserWishs', 'FK_Users_UserWishs', $_SESSION['id'], 'all');
            if ($userWishs == null) {
                echo "<p style='color: #b7b7b7; font-weight: 800; font-size: 24px'>Vous n'avez aucun jeu</p>";
            } else {
                foreach ($userWishs as $userWish) {
                    $Jeux = $modele->findById('tblGames', 'PK_Games', $userWish->FK_Games_UserWishs, 'fetch');
                    ?>
                    <div class="enfant">
                        <a href="../jeux/OneGame.php?gameid=<?= $Jeux->PK_Games ?>">
                            <img src="../../assets/img/insert_games/pp/<?= $Jeux->UQ_Games_Img ?>" alt="">
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
    </section>
    <!--  Souhait  -->

</main>
<script src="../../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>