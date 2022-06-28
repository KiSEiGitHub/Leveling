<?php
session_start();

// import des constante
require 'constante.php';

// import + instanciation du modele
require './BackEnd/modele.php';
$modele = new modele(HOST, DB, USER, MDP);

// Si l'utilisateur est déjà connecté alors on le revoie sur la page d'accueil
if (isset($_SESSION['pseudo'])) {
    header('Location: index.php');
}


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
    <title>Inscription</title>
</head>

<body>
<!--Barre de navigation DEBUT -->
<main class="form-inscription">
    <div>
        <?php
        switch ($_GET['msg']) {
            case 'champs':
            {
                echo "<p style='text-align: center; color: red'>Veuillez renseigner tous les champs</p>";
                break;
            }
            case 'image' : {
                echo "<p style='text-align: center; color: red'>Selectionner une image valide</p>";
                break;
            }
            case 'banner' : {
                echo "<p style='text-align: center; color: red'>Selectionner une bannière valide</p>";
                break;
            }
            case 'sucess' : {
                echo "<p style='text-align: center; color: green'>Votre compte a été créé !</p>";
                break;
            }
        }
        ?>
    </div>
    <div class="inscription-form">
        <form method="post" action="traitement.php" enctype="multipart/form-data">
            <div class="text-inscription">
                <p><strong>INSCRIPTION</strong></p>
            </div>

            <div class="profile-picture">
                <div class="user">
                    <label><strong>Photo de profil</strong>
                        <input type="file" name="img"/>
                    </label>
                </div>
                <div>
                    <label for="imgbanner"><strong>Banner</strong>
                        <input type="file" name="imgbanner">
                    </label>
                </div>
            </div>
            <div class="form-floating">
                <label for="prenom">Prénom
                    <input type="text" class="form-control" id="floatingPassword" name="prenom" maxlength="10">
                </label>
            </div>

            <div class="form-floating">
                <label for="nom">Nom
                    <input type="text" class="form-control" id="floatingPassword" name="nom" maxlength="10">
                </label>
            </div>

            <div class="form-floating">
                <label for="pseudo">Pseudo
                    <input type="text" class="form-control" id="floatingInput" name="pseudo" maxlength="10">
                </label>
            </div>


            <div class="form-floating">
                <label for="mdp">Mot de passe
                    <input type="password" class="form-control" id="floatingPassword" name="mdp">
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


            <div class="form-floating-bio">
                <label for="bio">Bio
                    <input type="text" class="form-control" id="floatingPassword" name="bio" rows="3"
                           maxlength="100">
                </label>
            </div>

            <input type="submit" name="btn-inscription" value="S'inscrire">

            <div class="inscription">
                    <span>Déjà inscrit ?&nbsp;
                        <a href="Connexion.php">Connexion</a>
                    </span>
            </div>
        </form>

    </div>
</main>
</body>

</html>