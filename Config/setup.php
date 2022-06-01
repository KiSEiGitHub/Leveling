<?php
require_once('controller.php');

class setup
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new controller("localhost", "leveling", "root", "");
    }

    public function FakeImage($img, $chemin)
    {
        $name = $img['name'];
        $size = $img['size'];
        $tpm = $img['tmp_name'];
        $err = $img['error'];
        $newimg = "";

        if ($err === 0) {
            if ($size > 3333333) {
                echo "<p>Taille de l'image trop élevée</p>";
            } else {
                $imp_extention = pathinfo($name, PATHINFO_EXTENSION); // on récupère uniquement l'extention du fichier
                $imp_extention_lower = strtolower($imp_extention); // pour être sur on la passe en minuscule

                // création de notre tableau d'extension accepté
                $allowed_extension = array("jpg", "png", "jpeg");

                // vérication de si l'extension est bien dans notre tableau
                if (in_array($imp_extention_lower, $allowed_extension)) {
                    // on déplace l'image dans le dossier de notre site
                    $newimg = uniqid("IMG-", true) . '.' . $imp_extention_lower;
                    $path = $chemin . $newimg;
                    move_uploaded_file($tpm, $path);
                } else {
                    return "err";
                }
            }
        }
        return $newimg;
    }

    public function getLvl($lvl)
    {
        $level = "";
        $ranks = "";

        switch ($lvl) {
            case '1' :
            {
                $level = "assets/img/ranks/novice/icon.png";
                $ranks = "assets/img/ranks/novice/text.png";
                break;
            }
            case '2' :
            {
                $level = "assets/img/ranks/apprentice/icon.png";
                $ranks = "assets/img/ranks/apprentice/text.png";
                break;
            }
            case '3' :
            {
                $level = "assets/img/ranks/adept/icon.png";
                $ranks = "assets/img/ranks/adept/text.png";
                break;
            }
            case '4' :
            {
                $level = "assets/img/ranks/veteran/icon.png";
                $ranks = "assets/img/ranks/veteran/text.png";
                break;
            }
            case '5' :
            {
                $level = "assets/img/ranks/pro/icon.png";
                $ranks = "assets/img/ranks/pro/text.png";
                break;
            }
            case '6' :
            {
                $level = "assets/img/ranks/expert/icon.png";
                $ranks = "assets/img/ranks/expert/text.png";
                break;
            }
            case '7' :
            {
                $level = "assets/img/ranks/champion/icon.png";
                $ranks = "assets/img/ranks/champion/text.png";
                break;
            }
            case '8' :
            {
                $level = "assets/img/ranks/master/icon.png";
                $ranks = "assets/img/ranks/master/text.png";
                break;
            }
            case '9' :
            {
                $level = "assets/img/ranks/grand_master/icon.png";
                $ranks = "assets/img/ranks/grand_master/text.png";
                break;
            }
            case '10' :
            {
                $level = "assets/img/ranks/legend/icon.png";
                $ranks = "assets/img/ranks/legend/text.png";
                break;
            }
            default :
            {
                return null;
            }
        }
        return [$level, $ranks];
    }

    public function checkInsertUser($tab, $img)
    {
        // on check si on a tous les champs
        foreach ($tab as $OneValue) {
            if ($OneValue == '') {
                return 'Veuillez renseigner tous les champs';
            }
        }

        // on check l'image
        if ($img['name'] == '') {
            return "Veuillez insérer une image";
        } else {
            $UserImg = $this->FakeImage($img, "./assets/img/UserProfilePicture/");
        }

        // on insert notre user
        $this->pdo->insertUser($tab, $UserImg);
        return "Utilisateur crée !";
    }

    public function checkConnexion($tab)
    {
        // on check si l'utilisateur a rensigner tous les champs
        foreach ($tab as $OneValue) {
            if ($OneValue == '') {
                return 'Veuillez renseigner les champs';
            }
        }

        // On garde en mémoire ses inputs
        $PotentialFakePseudo = $tab['pseudo'];
        $PotentialFakePassword = $tab['mdp'];

        // on récupère le user en fonction du pseudo donné
        $UserWhoWantToLogin = $this->pdo->Login($tab['pseudo']);

        // On set nos variable de Session
        $_SESSION['id'] = $UserWhoWantToLogin['id'];
        $_SESSION['pseudo'] = $UserWhoWantToLogin['pseudo'];
        $_SESSION['mdp'] = $UserWhoWantToLogin['password'];

        // On vérifie si tout concorde
        if ($PotentialFakePseudo == $_SESSION['pseudo'] && md5($PotentialFakePassword) == $_SESSION['mdp']) {
            header('Location: index.php');
        } else {
            return 'Mot de passe ou pseudo incorrect';
        }

    }

    public function checkCreateGroups($tab, $img)
    {
        // Renseigner tous les champs
        foreach ($tab as $OneValue) {
            if ($OneValue == '') {
                return 'Veuillez renseigner tous les champs';
            }
        }

        // controle image
        if ($img['name'] == '') {
            return 'Veuillez insérer une image';
        } else {
            $new = $this->FakeImage($img, "./assets/img/groupesPP/");
        }

        // création du groupes
        $this->pdo->insertGroups($_SESSION['id'], $tab, $new);
        header('Location: groupes.php');
    }
}