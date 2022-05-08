<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    header('Location: index.php');
}
require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();


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
    <title>Inscription</title>
    <link rel="stylesheet" href="scss/styles.css">
</head>

<body>
<div id="green-bar">
    <img src="images/leveling-logo.png" alt="" width="200em">
</div>
<main class="form-inscription">
    <div class="inscription-form">
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="profile-picture">
                <div class="user">
                    <img src="images/user.png" alt="">
                    <label>
                        <input type="file" name="img"/>
                    </label>               
                </div>
            </div>

            <div class="form-floating">
                <label for="pseudo">Pseudo
                    <input type="text" class="form-control" id="floatingInput" name="pseudo">
                </label>
            </div>

            <div class="form-floating">
                <label for="mdp">Mot de passe
                    <input type="password" class="form-control" id="floatingPassword" name="mdp">
                </label>
            </div>

            <div class="form-floating">
                <label for="prenom">Prénom
                    <input type="password" class="form-control" id="floatingPassword" name="prenom">
                </label>
            </div>

            <div class="form-floating">
                <label for="nom">Nom
                    <input type="password" class="form-control" id="floatingPassword" name="nom">
                </label>
            </div>


            <div class="form-floating">
                <label for="dateNaissance">Date de naissance
                    <input type="date" class="form-control" id="floatingPassword" name="dateNaissance">
                </label>
            </div>

            <div class="form-floating">
                <label for="age">Age
                    <input type="number" class="form-control" id="floatingPassword" name="age">
                </label>
            </div>

            <div class="form-floating">
                <label for="mail">E-mail
                    <input type="email" class="form-control" id="floatingPassword" name="mail">
                </label>
            </div>


            <div class="form-floating">
                <label for="bio">Bio
                    <input type="text" class="form-control" id="floatingPassword" name="bio">
                </label>
            </div>

            <input type="submit" name="btn" value="S'inscrire">

            <div class="inscription">
                <span>
                    Déjà inscrit ?&nbsp;
                    <a href="Connexion.php">Connexion</a>
                </span>

            </div>
            <?php
            if (isset($_POST['btn']) && isset($_FILES['img'])) {
                if (
                    !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])
                    && !empty($_POST['mdp']) && !empty($_POST['bio']) && !empty($_POST['pseudo'])
                    && !empty($_POST['age'] && !empty($_POST['dateNaissance']) && !empty($_FILES['img']))
                ) {
                    if ($_FILES['img']['name'] == '') {
                        echo "<p class='error'>Veuillez ajouté une image de profil</p>";
                    } else {
                        $newimg = $setup->FakeImage($_FILES['img'],"./assets/img/UserProfilePicture/");

                        if ($newimg === "err") {
                            echo "veuillez insérer une image valide";
                        } else {
                            $controler->insertUser($_POST, $newimg);
                        }
                    }

                } else {
                    echo "<p class='error'>Veuillez renseigner tous les champs</p>";
                }
            }
            ?>
        </form>

    </div>
</main>
</body>
</html>

