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
    <title>Inscription</title>
    <link rel="stylesheet" href="scss/styles.css">
</head>

<body>

    <!--Barre verte-->
    <div id="green-bar">
        <img src="images/leveling-logo.png" alt="" width="200em">
    </div>


    <main class="form-inscription">
        <div class="inscription-form">
            <form method="post" action="#">
                <img class="mb-4" src="./assets/img/website/leveling-logo.png" alt="" height="57">
                <div class="profile-picture">

                    <div class="user">
                        <img src="images/user.png" alt="" width="40%">
                        <label>
                            <input type="file" style="display: none;" accept="image/png, image/jpeg, image/jpg" />
                            <a class="choosepp">Ajouter une photo de profil</a>
                        </label>
                    </div>

                </div>

                <div class="form-floating">
                    <label for="exampleFormControlSelect1">Identifiant</label>
                    <input type="text" class="form-control" id="floatingInput" name="pseudo">
                    <label for=""></label>
                </div>

                <div class="form-floating">
                    <label for="exampleFormControlSelect1">Mot de passe</label>
                    <input type="password" class="form-control" id="floatingPassword" name="mdp">
                </div>

                <div class="form-floating">
                    <label for="exampleFormControlSelect1">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" id="floatingPassword" name="confirmmdp">
                </div>

                <div class="form-floating">
                    <label for="exampleFormControlSelect1">Date de naissance</label>
                    <input type="date" class="form-control" id="floatingPassword" name="birthday">
                </div>

                <div class="form-floating">
                    <label for="exampleFormControlSelect1">E-mail</label>
                    <input type="email" class="form-control" id="floatingPassword" name="email">
                </div>

                <input type="submit" name="btn" value="Se connecter">

                <div class="inscription">
                    <span>Déjà inscrit ?&nbsp;</span>
                    <a href="connexion.php">Connexion</a>
                </div>
        </div>
        </form>

</body>

</html>


<?php
require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

if (isset($_POST['btn']) && isset($_FILES['img'])) {
    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])
        && !empty($_POST['mdp']) && !empty($_POST['bio']) && !empty($_POST['pseudo'])
        && !empty($_POST['age'])
    ) {

        $newimg = $setup->FakeImage($_FILES['img']);

        if ($newimg === "err") {
            echo "veuillez insérer une image";
        } else {
            $controler->insertUser($_POST, $newimg);
        }
    } else {
        echo "<p>Veuillez renseigner tous les champs</p>";
    }
}
?>