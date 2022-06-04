<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("../../Config/controller.php");
require_once("../../Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$user = $controler->getUser($_SESSION['id']);
$userAbout = $controler->getUserAbout($_SESSION['id']);
$ranks = $setup->getLvl($user['lvl']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap');
    </style>
    <link rel="stylesheet" href="../../scss/styles.css">
    <title>Préférences du compte</title>
</head>

<body>

<!--Barre de navigation DEBUT -->
<div id="green-bar">
    <h1>
        <a href="../../index.php">LEVELING</a>
    </h1>
    <div class="nav-icons">
        <input type="text" name="search" placeholder="Rechercher" id="search">
        <?php
        if (isset($_SESSION['pseudo'])) {
            ?>
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="../../pages/profil/index.php">
                <img class="nav-user" src="../../images/user-circle.png" alt="">
            </a>
        <?php } ?>
        <a href="./preferences.php">
            <img class="nav-user" src="../../images/settings.png" alt="">
        </a>
    </div>
</div>
<!--Barre de navigation FIN -->

<!--Block principal-->
<div id="main-block">

    <!--Block amis-->
    <div id="settings-block">
        <h3>PRÉFÉRENCES DU PROFIL</h3>
        <form action="#" method="post" enctype="multipart/form-data">

            <label for="pfp">
                <span>Photo de profil</span>
                <img class="pfp-user" src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>"
                     alt="photo de profil de l'utilisateur">
                <input type="file" name="pfp" value="Bonjour">
            </label>

            <label for="banner">
                <span>Image de couverture</span>
                <img class="banner-user" src="../../assets/img/UserProfilBanner/<?= $user['img_banner'] ?>"
                     alt="bannière de l'utilisateur">
                <input type="file" name="banner" value="../../assets/img/UserProfilBanner/<?= $user['img_banner'] ?>">
            </label>

            <label for="pseudo">
                <span>Pseudo</span>
                <input class="inputtext" type="text" name="pseudo" value="<?= $user['pseudo'] ?>">
            </label>

            <label for="mail">
                <span>Adresse mail</span>
                <input class="inputtext" type="email" name="mail" value="<?= $user['mail'] ?>">
            </label>

            <label for="prenom">
                <span>Prénom</span>
                <input class="inputtext" type="text" name="prenom" value="<?= $user['prenom'] ?>">
            </label>

            <label for="nom">
                <span>Nom</span>
                <input class="inputtext" type="text" name="nom" value="<?= $user['nom'] ?>">
            </label>

            <label for="DateNaissance">
                <span>Date de naissance</span>
                <input class="inputtext" type="date" name="DateNaissance" value="<?= $user['DateDeNaissance'] ?>">
            </label>

            <label for="age">
                <span>Age</span>
                <input class="inputtext" type="number" name="age" value="<?= $user['age'] ?>">
            </label>

            <label for="pays">
                <span>Pays</span>
                <select class="inputtext" name="pays" id="pays">
                    <option value="france">France</option>
                </select>
            </label>

            <label for="JeuFav">
                <span>Jeu favori</span>
                <select class="inputtext" name="jeux" id="jeux">
                    <option value="<?= $userAbout['jeu_fav'] ?>"><?= $userAbout['jeu_fav'] ?></option>
                    <?php
                    $allGames = $controler->getAllGames();
                    foreach ($allGames as $One) { ?>
                        <option value="<?= $One['name'] ?>"><?= $One['name'] ?></option>
                    <?php } ?>
                </select>
            </label>

            <label for="GenreFav">
                <span>Genre favori</span>
                <select class="inputtext" name="genre" id="genre">
                    <option value="<?= $userAbout['genre_fav'] ?>"><?= $userAbout['genre_fav'] ?></option>
                    <option value="Aventure">Aventure</option>
                    <option value="Action">Action</option>
                    <option value="Horreur">Horreur</option>
                    <option value="MMO">MMO</option>
                    <option value="FPS">FPS</option>
                    <option value="RPG">RPG</option>
                </select>
            </label>

            <label for="platforme">
                <span>Platforme favorite</span>
                <select class="inputtext" name="platforme" id="#">
                    <option value="<?= $userAbout['plateforme_fav'] ?>"><?= $userAbout['plateforme_fav'] ?></option>
                    <option value="PC">PC</option>
                    <option value="XBOX">Xbox One</option>
                    <option value="PS4">PS4</option>
                    <option value="PS5">PS5</option>
                </select>
            </label>

            <label for="Bio">
                <span>Biographie</span>
                <input class="inputtext" type="text" name="bio" value="<?= $user['bio'] ?>">
            </label>

            <label for="submit">
                <input class="inputtext" type="submit" id="btn_pref" name="btn" value="Valider">
            </label>

        </form>
    </div>
</div>
<?php
if (isset($_POST['btn'])) {
    $controler->updateUserPreference($_POST, $_SESSION['id']);
}
?>
<script src="../../js/main.js"></script>
</body>

</html>