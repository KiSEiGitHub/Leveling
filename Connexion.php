<?php
session_start();

// import des constantes
require 'constante.php';

if (isset($_SESSION['pseudo'])) {
    header('Location: index.php');
}

require 'BackEnd/modele.php';
$modele = new modele(HOST, DB, USER, MDP);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Leveling - Page de connexion</title>
    <link rel="stylesheet" href="scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
</head>

<body>

<main class="form-signin">
    <div class="sign-form">
        <form method="post" action="#">
            <img class="mb-4" src="./assets/img/website/leveling-logo.png" alt="" height="57">
            <h1 class="connexion">CONNEXION</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Pseudo" name="pseudo">
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="mdp">
            </div>

            <input type="submit" name="btn_Connexion" value="Se connecter">

            <div class="inscription">
                <span>Toujours pas inscrit ?&nbsp;</span>
                <a href="inscription.php">Inscription</a>
            </div>

            <p>&copy; 2022</p>
            <?php
            if (isset($_POST['btn_Connexion'])) {
                echo $modele->checkConnexion($_POST);
            }
            ?>
        </form>
    </div>
</main>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>