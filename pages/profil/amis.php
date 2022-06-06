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
$ranks = $setup->getLvl($user['lvl']);
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
    <title>Amis</title>
</head>

<body>
<!--Barre de navigation-->
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

<!--Block principal-->
<div id="main-block">

    <!--Image de couverture-->
    <style>
        #cover-image {
            background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/UserProfilBanner/<?= $user['img_banner'] ?>");
        }
    </style>
    <!--Image de couverture-->

    <!--  Le header profil  -->
    <div id="cover-image">
        <p id="username">
            @<?= $user['pseudo'] ?>
        </p>
        <ul>
            <li class="border-white">
                <a href="../../pages/profil/index.php">Description</a>
            </li>
            <li class="border-white">
                <a href="jeux.php">Jeux</a>
            </li>
            <li class="border-white">
                <a href="groupes.php">Groupes</a>
            </li>
            <li>
                <a href="amis.php">Amis</a>
            </li>
        </ul>

        <div id="profile-picture">
            <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp" id="pp">
            <?php
            if ($ranks === null) {
                echo "<p>No ranks</p>";
            } else {

                ?>
                <img id="lvl-icon" src="../../<?= $ranks[0] ?>" alt="rank" width="65px">
                <img id="lvl-rank" src="../../<?= $ranks[1] ?>" alt="ranks" width="400px">
            <?php } ?>
        </div>
    </div>
    <!--  Le header profil  -->

    <!--Icônes Ajouter un ami + Envoyer un message -->
    <div class="icons-friend-message">
        <a href="settings.php"><img src="../../assets/img/icons/paintbrush-solid.png" alt=""
                                    width="30"></a>
        <img src="../../assets/img/icons/comment-dots-solid.png" alt="" width="30">
        <img src="../../assets/img/icons/user-plus-solid.png" alt="" width="30">
    </div>
    <!--Icônes Ajouter un ami + Envoyer un message -->


    <!--Block du meilleur ami-->
    <div id="best-friend">
        <div id="share">
            <img src="../../images/user.png" alt="" width="80px">
            <div id="text">
                <h1><a href="">@Friend</a></h1>
                <p><span>0</span> Heures de jeu passées ensembles</p>
            </div>
        </div>
    </div>
    <!--Block du meilleur ami-->

    <!--Block amis-->
    <div id="friends-block">
        <h3>AMIS</h3>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addfriends">
            Ajouter un ami
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removefriends">
            Supprimer un ami
        </button>
        <div class="all-friends">
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@Arouf Gangsta</span>
            </div>
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@Kaaris</span>
            </div>
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@JlSeramx</span>
            </div>
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@DanLevi</span>
            </div>
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@Maz</span>
            </div>
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@Garance</span>
            </div>
            <div class="friend">
                <img src="../../images/user.png" alt="pfp user">
                <span>@DylanLan</span>
            </div>
        </div>
    </div>
    <!--Block amis-->

    <!-- Modal Ajouter un ami -->
    <div class="modal fade" id="addfriends" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un ami</h5>
                <div class="modal-body">
                    <form action="#" method="post">
                        <label for="searchFriend">
                            <input type="text" name="searchFriend" placeholder="@">
                        </label>
                    </form>
                </div>
                <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
    <!-- Modal Ajouter un ami -->

    <!--  Modal supprimer un ami  -->
    <div class="modal fade" id="removefriends" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un ami</h5>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal supprimer un ami  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>

</html>