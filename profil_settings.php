<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$user = $controler->getUser($_SESSION['id']);
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
    <link rel="stylesheet" href="scss/styles.css">
    <title>Préférences du compte</title>
</head>

<body>

    <!--Barre de navigation-->
    <?php require_once 'components/greenbar.php' ?>

    <!--Block principal-->
    <div id="main-block">

        <!--Block amis-->
        <div id="settings-block">
            <h3>PRÉFÉRENCES DU PROFIL</h3>

            <div class="grid">
                <div class="card">
                    <p>Photo de profil</p><br>
                    <p>Image de couverture</p><br>
                    <p>Identifiant</p><br>
                    <p>Prénom</p><br>
                    <p>Nom</p><br>
                    <p>Date de naissance</p><br>
                    <p>Âge</p><br>
                    <p>Pays</p><br>
                    <p>Jeu favori</p><br>
                    <p>Genre favori</p><br>
                    <p>Plateforme favorite</p><br>
                    <p>Biographie</p>
                </div>
                <div class="card">
                    <img class="pp" src="assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp" id="pp" width="100px"><input type="file" name="" value""><br>
                    <style>
                        #cover-image {
                            background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("./images/cover-image-test.jpg");
                        }
                    </style>
                    <div id="cover-image"></div><input type="file" name="" value""><br>
                    <input type="text" class="" id="" name="pseudo" maxlength="10"><br>
                    <input type="text" class="" id="" name="prenom" maxlength="10">
                    <input type="checkbox" id="" name="">
                    <label for="checkbox">Afficher sur le profil</label>
                    <br>
                    <input type="text" class="" id="" name="nom" maxlength="10">
                    <input type="checkbox" id="" name="">
                    <label for="checkbox">Afficher sur le profil</label><br>
                    <input type="date" class="" id="" name="dateNaissance">
                    <input type="checkbox" id="" name="">
                    <label for="checkbox">Afficher sur le profil</label><br>
                    <input type="number" class="" id="" name="age">
                    <input type="checkbox" id="" name="">
                    <label for="checkbox">Afficher sur le profil</label><br>
                    <select name="selectcountry" id="selectcountry">
                        <option value="">Sélectionner un pays</option>
                    </select>
                    <input type="checkbox" id="" name="">
                    <label for="checkbox">Afficher sur le profil</label><br>
                    <select name="selectgame" id="selectgame">
                        <option value="">Sélectionner un jeu</option>
                    </select><br>
                    <select name="selectcategory" id="selectcategory">
                        <option value="">Sélectionner une catégorie</option>
                    </select><br>
                    <select name="selectplateform" id="selectplateform">
                        <option value="">Sélectionner une plateforme</option>
                    </select><br>
                    <input type="text" class="" id="" name="bio" rows="3" maxlength="100"><br>
                    <input type="submit" name="btn" value="Valider">

                </div>
            </div>

        </div>

    </div>
    </div>

</html>