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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création groupes</title>
    <link rel="stylesheet" href="scss/styles.css">
</head>
<body>
<?php require_once 'components/greenbar.php' ?>
<form action="#" method="post">
    <label for="nomgroupe">
        nom du groupe :
        <input type="text" name="nomgroupe">
    </label>
    <br>
    <label for="privacy">
        Sélectionner privacy
        <select name="privacy" id="privacy">
            <option value="public">Public</option>
            <option value="private">Privé</option>
        </select>
    </label>
    <label for="submit">
        <input type="submit" name="btn-grp" value="créer">
    </label>
    <?php
    if (isset($_POST['btn-grp'])) {
        if (!empty($_POST['nomgroupe'])) {
            $controler->insertGroups($_SESSION['id'], $_POST);
            header('location: profil_groupes.php');
        } else {
            echo "<p>Renseigner les champs</p>";
        }
    }
    ?>
</form>
</body>
</html>