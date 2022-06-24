<?php
session_start();
require '../../BackEnd/modele.php';

// instanciation
$modele = new modele('localhost', 'leveling', 'root', '');

if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

$user = $modele->findById('tblUsers', 'PK_Users', $_SESSION['id'], 'fetch');
extract((array)$user);
$ranks = $modele->getLvl($UQ_Users_Level);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création groupes</title>
    <link rel="stylesheet" href="../../scss/styles.css">
</head>
<body>

<!--Barre de navigation DEBUT -->
<header>
    <nav>
        <div class="logo">
            <a href="../../index.php">
                <img src="../../images/leveling-logo.png" alt="leveling-logo">
            </a>
        </div>
        <div class="right">
            <label for="search">
                <input type="search" name="search">
            </label>
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>
<!--Barre de navigation DEBUT -->

<main id="creategroups">

    <div class="create-groupe-block">
        <h3>Création d'un groupe</h3>

        <form action="#" method="post" enctype="multipart/form-data">
            <label for="pfp">
                Photo de profil
                <input type="file" name="imggroupes">
            </label>
            <label for="pfp-cover">
                Photo de couverture
                <input type="file" name="imggroupecover">
            </label>
            <label for="nomgroupe">
                Nom du groupe
                <input type="text" name="nomgroupe">
            </label>
            <label for="privacy">
                Visibilité
                <select name="privacy" id="privacy">
                    <option value="public">Public</option>
                    <option value="prive">privé</option>
                </select>
            </label>
            <label for="jeux">
                jeux associé
                <select name="jeux" id="jeux">
                    <option value="test">jeux</option>
                </select>
            </label>
            <label for="description">
                Description du groupe
                <input type="text" name="description" placeholder="300 caractère maximum">
            </label>
            <label for="submit">
                <input type="submit" class="btn btn-primary" name="btn-grp" value="Valider">
            </label>
            <?php
            if (isset($_POST['btn-grp']) && isset($_FILES)) {
                $modele->checkCreateGroups($_POST, $_FILES['imggroupes'], $_FILES['imggroupecover']);
            }
            ?>
        </form>
    </div>
</main>
</body>
</html>