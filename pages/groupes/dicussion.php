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

$groups = $controler->getOneGroups($_GET['idgroup']);
$creator = $controler->getUser($groups['creator'])
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Groupe</title>
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

    <!--Block principal DEBUT -->
    <div id="main-block">

        <!--Image de couverture DEBUT -->
        <style>
            #groupe-cover-image {
                background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/groupe/cover-image.jpg");
            }
        </style>
        <!--Image de couverture FIN -->

        <!--  Le header profil DEBUT -->
        <div id="groupe-cover-image">
            <p id="username">
                #SoRPlayers
            </p>
            <ul>
                <li class="border-white">
                    <a href="index.php?idgroup=<?= $groups['id'] ?>">Description</a>
                </li>
                <li class="border-white">
                    <a href="dicussion.php?idgroup=<?= $groups['id'] ?>">Discussions</a>
                </li>
                <li class="border-white">
                    <a href="membres.php?idgroup=<?= $groups['id'] ?>">Membres</a>
                </li>
            </ul>

            <div id="groupe-profile-picture">
                <img src="../../assets/img/groupe/pp.jpg" alt="pfp" id="pp">
            </div>
        </div>
        <!--  Le header profil FIN -->



        <!--Icônes Ajouter un ami + Envoyer un message DEBUT -->
        <div class="groupe-icons-friend-message">
            <a href="settings.php"><img src="../../assets/img/icons/paintbrush-solid.png" alt="" width="30"></a>
            <img src="../../assets/img/icons/user-plus-solid.png" alt="" width="30">
        </div>
        <!--Icônes Ajouter un ami + Envoyer un message FIN -->
        <!--Block Description du groupe -->
        <div id="description-block">
            <div id="share">
                <p>JOIN THE STREET FIGHTER 4 DISCORD SERVER BELOW !
                    <br> ➤ https://discord.gg/j6S3PTRe
                </p>
            </div>
        </div>
        <!--Block Description du groupe FIN -->

        <!-- Block groupe discussion -->
        <div class="central-discussions">
            <h4><strong>DISCUSSIONS</strong></h4>
            <p>Trier par
                <input type="text" class="input-tried-discussion" name="tried-discussions" placeholder="Plus récent">
                <input type="text" class="input-search-discussion" name="search-discussions" palceholder="">
            </p>
            <div class="new-discussion">
                <input type="submit" class="btn-discussions" name="btn-discussion" value="Nouvelle discussion">
            </div>
            <!---->
            <div class="oneBlock-discussion">
                <div class="icon-left-discussion">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M493.6 163c-24.88-19.62-45.5-35.37-164.3-121.6C312.7 29.21 279.7 0 256.4 0H255.6C232.3 0 199.3 29.21 182.6 41.38c-118.8 86.25-139.4 101.1-164.3 121.6C6.75 172 0 186 0 200.8v263.2C0 490.5 21.49 512 48 512h416c26.51 0 48-21.49 48-47.1V200.8C512 186 505.3 172 493.6 163zM303.2 367.5C289.1 378.5 272.5 384 256 384s-33.06-5.484-47.16-16.47L64 254.9V208.5c21.16-16.59 46.48-35.66 156.4-115.5c3.18-2.328 6.891-5.187 10.98-8.353C236.9 80.44 247.8 71.97 256 66.84c8.207 5.131 19.14 13.6 24.61 17.84c4.09 3.166 7.801 6.027 11.15 8.478C400.9 172.5 426.6 191.7 448 208.5v46.32L303.2 367.5z" />
                    </svg>
                </div>
                <div class="text-oneblock-discussion">
                    <p>ÉPINGLÉ : Official Street of rage 4 Discord server<br>By <strong>@MICHA</strong></p>
                    <p class="date-discussion"> Le 18/04/2022 à 12:54</p>
                </div>
                <div class="icon-right-discussion">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z" />
                    </svg>
                </div>
            </div>

            <!---->
            <div class="oneBlock-discussion">
                <div class="icon-left-discussion">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">

                        <path d="M298.028 214.267L285.793 96H328c13.255 0 24-10.745 24-24V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v48c0 13.255 10.745 24 24 24h42.207L85.972 214.267C37.465 236.82 0 277.261 0 328c0 13.255 10.745 24 24 24h136v104.007c0 1.242.289 2.467.845 3.578l24 48c2.941 5.882 11.364 5.893 14.311 0l24-48a8.008 8.008 0 0 0 .845-3.578V352h136c13.255 0 24-10.745 24-24-.001-51.183-37.983-91.42-85.973-113.733z" />
                    </svg>
                </div>
                <div class="text-oneblock-discussion">
                    <p>ÉPINGLÉ : Official Street of rage 4 Discord server<br>By <strong>@MICHA</strong></p>
                    <p class="date-discussion"> Le 18/04/2022 à 12:54</p>
                </div>
                <div class="icon-right-discussion">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z" />
                    </svg>
                </div>
            </div>


            <!---->
            <div class="oneBlock-discussion">
                <div class="icon-left-discussion">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M493.6 163c-24.88-19.62-45.5-35.37-164.3-121.6C312.7 29.21 279.7 0 256.4 0H255.6C232.3 0 199.3 29.21 182.6 41.38c-118.8 86.25-139.4 101.1-164.3 121.6C6.75 172 0 186 0 200.8v263.2C0 490.5 21.49 512 48 512h416c26.51 0 48-21.49 48-47.1V200.8C512 186 505.3 172 493.6 163zM303.2 367.5C289.1 378.5 272.5 384 256 384s-33.06-5.484-47.16-16.47L64 254.9V208.5c21.16-16.59 46.48-35.66 156.4-115.5c3.18-2.328 6.891-5.187 10.98-8.353C236.9 80.44 247.8 71.97 256 66.84c8.207 5.131 19.14 13.6 24.61 17.84c4.09 3.166 7.801 6.027 11.15 8.478C400.9 172.5 426.6 191.7 448 208.5v46.32L303.2 367.5z" />
                    </svg>
                </div>
                <div class="text-oneblock-discussion">
                    <p>ÉPINGLÉ : Official Street of rage 4 Discord server<br>By <strong>@MICHA</strong></p>
                    <p class="date-discussion"> Le 18/04/2022 à 12:54</p>
                </div>
                <div class="icon-right-discussion">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z" />
                    </svg>
                </div>
            </div>














        </div>







        <!-- Block groupe discussion -->




        <!--Block principal DEBUT -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>