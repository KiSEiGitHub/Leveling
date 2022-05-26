<?php
require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$all = $controler->getAllUsers();
?>

<form action="#" method="post">
    <input type="text" name="recherche" placeholder="recherche">
    <input type="submit" name="btn-search" value="rechercher">
</form>

<h2>User</h2>
<?php
if (isset($_POST['btn-search'])) {
    if (!empty($_POST['recherche'])) {
        $User = $controler->searchUser($_POST['recherche']);
        echo "<p>" . $User['pseudo'] . "</p>";
    } else {
        foreach ($all as $one) {
            echo "<p>" . $one['pseudo'] . "</p>";
        }
    }
} else {
    foreach ($all as $one) {
        echo "<p>" . $one['pseudo'] . "</p>";
    }
}
?>
