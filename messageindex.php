<?php
require_once("Config/controller.php");
$controler = new controller("localhost", "leveling", "root", "");
$lesUsers = $controler->getAllUser();

foreach($lesUsers as $unUser){
    echo "<p>".$unUser['pseudo']."</p>";
}




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>JE VEUX TOUT JUSTER ECRIRE UNE PHARSE ZEBI</title>
</head>
<body>
    
</body>
</html>

