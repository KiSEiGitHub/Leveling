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
<form action="#" method="post" enctype="multipart/form-data">
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
    <br>
    <label for="imggroupes">
        Image du groupe
        <input type="file" name="imggroupes">
    </label>
    <label for="submit">
        <input type="submit" name="btn-grp" value="créer">
    </label>
    <?php
    if (isset($_POST['btn-grp']) && isset($_FILES)) {
        if (!empty($_POST['nomgroupe'])) {
            if ($_FILES['imggroupes']['name'] == '') {
                echo "<p>Veuillez insérer une image de profil du groupe</p>";
            } else {
                var_dump('c bon');
                $img = $setup->FakeImage($_FILES['imggroupes'], "./assets/img/groupesPP/");
                $controler->insertGroups($_SESSION['id'], $_POST, $img);
                header('location: profil_groupes.php');
            }
        } else {
            echo "<p>Renseigner les champs</p>";
        }
    }
    ?>
</form>
</body>
</html>