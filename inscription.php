<?php
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
                    <img src="images/user.png" alt="" width="40%">
                    <label>
                        <input type="file" name="img"/>
                        <!--                        <a class="choosepp">Ajouter une photo de profil</a>-->
                    </label>
                </div>

            </div>

            <div class="form-floating">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="floatingInput" name="pseudo">
            </div>

            <div class="form-floating">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="floatingPassword" name="mdp">
            </div>

            <div class="form-floating">
                <label for="prenom">Prénom</label>
                <input type="password" class="form-control" id="floatingPassword" name="prenom">
            </div>

            <div class="form-floating">
                <label for="nom">Nom
                    <input type="password" class="form-control" id="floatingPassword" name="nom">
                </label>
            </div>


            <div class="form-floating">
                <label for="dateNaissance">Date de naissance</label>
                <input type="date" class="form-control" id="floatingPassword" name="dateNaissance">
            </div>

            <div class="form-floating">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="floatingPassword" name="age">
            </div>

            <div class="form-floating">
                <label for="mail">E-mail</label>
                <input type="email" class="form-control" id="floatingPassword" name="mail">
            </div>


            <div class="form-floating">
                <label for="bio">Bio</label>
                <input type="text" class="form-control" id="floatingPassword" name="bio">
            </div>

            <input type="submit" name="btn" value="Se connecter">

            <div class="inscription">
                <span>Déjà inscrit ?&nbsp;</span>
                <a href="Connexion.php">Connexion</a>
            </div>
            <?php
            if (isset($_POST['btn']) && isset($_FILES['img'])) {
                if (
                    !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])
                    && !empty($_POST['mdp']) && !empty($_POST['bio']) && !empty($_POST['pseudo'])
                    && !empty($_POST['age'] && !empty($_POST['dateNaissance']))
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
        </form>

    </div>
</main>
</body>
</html>

