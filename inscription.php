<?php
require_once("Config/controller.php");
$controler = new controller("localhost", "leveling", "root", "");

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

        /*
            $_FILES[''] nous donne un tableau à double entrer.
            Pour pouvoir controler si c'est une image ou non on va avoir besoin de ça
        */

        $img_name = $_FILES['img']['name'];
        $img_size = $_FILES['img']['size'];
        $img_tpm = $_FILES['img']['tmp_name'];
        $img_err = $_FILES['img']['error'];

        // vérification de si l'image est une vrai image ou pas
        if ($img_err === 0) {
            if ($img_size > 3333333) {
                echo "<p>Taille de l'image trop élevée</p>";
            } else {
                $imp_extention = pathinfo($img_name, PATHINFO_EXTENSION); // on récupère uniquement l'extention du fichier
                $imp_extention_lower = strtolower($imp_extention); // pour être sur on la passe en minuscule

                // création de notre tableau d'extension accepté
                $allowed_extension = array("jpg", "png", "jpeg");

                // vérication de si l'extension est bien dans notre tableau
                if (in_array($imp_extention_lower, $allowed_extension)) {
                    // on déplace l'image dans le dossier de notre site
                    $newimg = uniqid("IMG-", true) . '.' . $imp_extention_lower;
                    $path = "./assets/img/UserProfilePicture/" . $newimg;
                    move_uploaded_file($img_tpm, $path);
                    // on peut maintenant utiliser la fonction d'insertion d'un utilisateur
                    $controler->insertUser($_POST, $newimg);
                } else {
                    echo "<p>Veuillez insérer une image</p>";
                }
            }
        } else {
            echo "<p>Oups, une erreur est survenue</p>";
        }


    } else {
        echo "<p>Veuillez renseigner tous les champs</p>";
    }
}
?>