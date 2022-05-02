<?php
require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();
?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inscription</title>
    </head>
    <body>
    <!--
        balise style placé juste pour les tests, il faut les enlever plus tard
    -->
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>

    <form action="#" method="post" enctype="multipart/form-data">
        <label for="prenom">
            Prénom
            <input type="text" name="prenom">
        </label>
        <label for="nom">
            Nom
            <input type="text" name="nom">
        </label>
        <label for="pseudo">
            Pseudo
            <input type="text" name="pseudo">
        </label>
        <label for="Bio">
            Bio
            <input type="text" name="bio">
        </label>
        <label for="age">
            age
            <input type="number" name="age">
        </label>
        <label for="mail">
            Adresse mail
            <input type="email" name="mail">
        </label>
        <label for="password">
            mot de passe
            <input type="password" name="mdp">
        </label>
        <label for="img">
            Photo de profil
            <input type="file" name="img">
        </label>
        <label for="submit">
            <input type="submit" name="btn" value="inscription">
        </label>
    </form>
    </body>
    </html>


    <!-- PHP -->
<?php
if (isset($_POST['btn']) && isset($_FILES['img'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])
        && !empty($_POST['mdp']) && !empty($_POST['bio']) && !empty($_POST['pseudo'])
        && !empty($_POST['age'])) {

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