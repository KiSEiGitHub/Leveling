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
    <title>Insertion d'un jeu</title>
</head>
<body>
    <center>
        <h1>INSERTION D'UN JEU</h1>

        <form method="post" action="#" enctype="multipart/form-data">
            <label for="name">Nom du jeu :
                <input type="text" name="name"/> 
            </label>
                <br> <br>
            <label for="description">Description :
                <input type="text" name="description"/> 
            </label>
            <br> <br>
            <label for="genre">Genre :
                <input type="text" name="genre"/> 
            </label>
                <br> <br>
            <label for="plateforme">Plateformes :
                <input type="text" name="plateforme">
            </label>
                <br> <br>
            <label for="date_sortie">Date de sortie :
                <input type="date" name="date_sortie"/> 
            </label>
            <br> <br>
            <label for="evaluation">Evaluation du jeu : /20
                <input type="text" name="evaluation"/> 
            </label>
            <br> <br>
            <label for="prix">Prix : 
                <input type="text" name="prix"/> €
            </label>
                <br> <br>
            <label for="img_pp">Image principale :
                <input type="file" name="img_pp"/> 
            </label>
            <br> <br>
            <label for="img_banner">Image Bannière :
                <input type="file" name="img_banner"/> 
            </label>
            <br> <br>
            <label for="img_others">Autres images :
                <input type="file" name="img_others"/> 
            </label>
            <br> <br>
            <input type="submit" name="btn" value="Ajoutez le jeu">

        </form>
        

        <?php
        if(isset($_POST['btn']) && isset($_FILES['img_pp']) && isset($_FILES['img_banner']) && isset($_FILES['img_others'])){
            if(
                !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['genre']) && !empty($_POST['date_sortie'])
                && !empty($_POST['evaluation']) && !empty($_POST['prix'])  && !empty($_POST['plateforme']) 
                && !empty($_FILES['img_pp']) && !empty($_FILES['img_banner']) && !empty($_FILES['img_others'])
            ){
                if ($_FILES['img_pp']['name'] == '' &&  $_FILES['img_banner']['name'] == '' && $_FILES['img_others']['name'] == '') {
                    echo "<p class='error'>Veuillez ajouté l'image principale </p>";
                } else {
                    $newimg = $setup->FakeImage($_FILES['img_pp'],"./assets/img/insert_games/pp/");
                    $newimg1 = $setup->FakeImage($_FILES['img_banner'],"./assets/img/insert_games/banner/");
                    $newimg2 = $setup->FakeImage($_FILES['img_others'],"./assets/img/insert_games/others/");

                    if ($newimg === "err") {
                        echo "veuillez insérer une image valide";
                    } else {
                        $controler->insertGame($_POST, $newimg, $newimg1, $newimg2);
                    }
                }
        
            }
        }
        
        ?>













    </center>
</body>
</html>