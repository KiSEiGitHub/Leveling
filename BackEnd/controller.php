<?php

/*
Ce fichier va servir à controler
*/

class controller
{
    public function __construct(
        string      $host,
        string      $dbname,
        string      $root,
        string      $mdp,
        public ?PDO $pdo = null
    )
    {
        /*
            ça c'est additionnel, le seul truc important à savoir c'est le défault fetch mode.
            De base le fetch nous return un array (tableau), aujourd'hui c'est mieux de travailler avec des Objets
            Donc chaque fetch return maintenant un objet
        */
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // On essaye de se connecter, dans le cas ou ça ne marche pas, on aura une erreur afficher à l'écran
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $root, $mdp, $options);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la bdd";
            echo "<br>";
            // la variable $e stock la VRAI erreur
            echo "Message d'erreur : $e";
        }
    }

    public function FakeImage($img, string $chemin): string
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

    public function getLvl(string $lvl): ?array
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

    public function checkInsertUser(array $tab, $img, $banner): ?string
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

        if ($banner['name'] == '') {
            return 'Veuillez insérer une image de bannière';
        } else {
            $profilBanner = $this->FakeImage($banner, "./assets/img/UserProfilBanner/");
        }

        // on insert notre user
        $this->insertUser($tab, $UserImg, $profilBanner);
        return 'Utilisateur créé !';
    }

    public function insertUser(array $tab, string $profilePicture, string $profileBanner): string
    {
        // requête d'insertion
        $r = "INSERT INTO tblUsers VALUES(null, :nom, :prenom, :mdp, :age, :bio, :pp, :role, :dateNaissance, :mail, :lvl, :imgBanner, :pseudo)";

        // variable de protection de la requête
        $data = array(
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":mdp" => md5($tab['mdp']),
            ":age" => $tab['age'],
            ":bio" => $tab['bio'],
            ":pp" => $profilePicture,
            ":role" => 'user',
            ":dateNaissance" => $tab['dateNaissance'],
            ":mail" => $tab['mail'],
            ":lvl" => 1,
            ":imgBanner" => $profileBanner,
            ":pseudo" => $tab['pseudo']
        );

        // on controle si on est bien relié à la bdd
        if ($this->pdo != null) {
            $stmt = $this->pdo->prepare($r);
            $stmt->execute($data);
            return 'Utilisateur crée';
        } else {
            return 'Erreur de connexion à la bdd';
        }


    }

    public function checkConnexion(array $tab): ?string
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
        $UserWhoWantToLogin = $this->Login($tab['pseudo']);

        // On set nos variable de Session
        $_SESSION['id'] = $UserWhoWantToLogin->PK_Users;
        $_SESSION['pseudo'] = $UserWhoWantToLogin->UQ_Users_Pseudo;
        $_SESSION['mdp'] = $UserWhoWantToLogin->UQ_Users_Password;

        // On vérifie si tout concorde
        if ($PotentialFakePseudo == $_SESSION['pseudo'] && md5($PotentialFakePassword) == $_SESSION['mdp']) {
            header('Location: index.php');
        }

        return 'utilisateur créé';

    }

    public function checkCreateGroups(array $tab, $img, $img2): ?string
    {
        // Renseigner tous les champs
        foreach ($tab as $OneValue) {
            if ($OneValue == '') {
                return 'Veuillez renseigner tous les champs';
            }
        }

        // controle image 1
        if ($img['name'] == '') {
            return 'Veuillez insérer une image';
        } else {
            $new = $this->FakeImage($img, "../../assets/img/groupesPP/");
        }

        // on controle l'image 2
        if ($img2['name'] == '') {
            return 'Veuillez insérer une image';
        } else {
            $banner = $this->FakeImage($img2, "../../assets/img/groupesBanner/");
        }

        // création du groupes
        $this->insertGroups($_SESSION['id'], $tab, $new, $banner);
        header('Location: ../profil/groupes.php');
        return 'oui';
    }

    public function Login(string $pseudo): ?stdClass
    {
        $r = "select * from tblusers where UQ_Users_Pseudo ='$pseudo'";
        if ($this->pdo != null) {
            $r2 = $this->pdo->prepare($r);
            $r2->execute();
            return $r2->fetch();
        } else {
            return "pas bon";
        }
    }

    public function insertUserGames(string $tbl, int $idUser, int $idGame): bool
    {
        return $this->pdo->prepare("INSERT INTO {$tbl} values(null, :user, :game)")->execute([":user" => $idUser, ":game" => $idGame]);
    }

    public function insertGroups(int $iduser, array $tab, $img, $banner): void
    {
        // Insérer dans la table userGroups
        $r = "INSERT INTO tblusergroups values(null, :nom, :privacy, :img, :banner, :jeux, :desc, :FK, :membre)";
        $data = array(
            ":nom" => $tab['nomgroupe'],
            ":privacy" => $tab['privacy'],
            ":img" => $img,
            ":banner" => $banner,
            ":jeux" => $tab['jeux'],
            ":desc" => $tab['description'],
            ":FK" => $iduser,
            ":membre" => 0
        );

        if ($this->pdo != null) {
            $stmt = $this->pdo->prepare($r);
            $stmt->execute($data);
            $this->addUserXp($iduser, 'Addgroup');
        }

    }

    public function addUserXp(int $id, string $action): void
    {
        // récupération d'un user
        $user = $this->pdo->query("SELECT * FROM tblusers WHERE PK_Users = {$_SESSION['id']}")->fetch();

        // récupération about d'un user
        $UserAbout = $this->pdo->query("SELECT * FROM tblaboutusers WHERE FK_Users_AboutUsers = {$user->PK_Users}")->fetch();

        switch ($action) {
            case 'Addgroup':
            {
                $MoreXp = $UserAbout->UQ_AboutUsers_Exp + 7;
                $r = "UPDATE tblaboutusers SET UQ_AboutUsers_Exp = $MoreXp WHERE FK_Users_AboutUsers = $user->PK_Users";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
            case 'AddGames' :
            {
                $MoreXp = $UserAbout->UQ_AboutUsers_Exp + 5;
                $r = "UPDATE tblaboutusers SET UQ_AboutUsers_Exp = $MoreXp WHERE FK_Users_AboutUsers = $user->PK_Users";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
            case 'AddGamesWish' :
            {
                $MoreXp = $UserAbout->UQ_AboutUsers_Exp + 3;
                $r = "UPDATE tblaboutusers SET UQ_AboutUsers_Exp = $MoreXp WHERE FK_Users_AboutUsers = $user->PK_Users";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
            case 'UpdateGroups' :
            {
                $MoreXp = $UserAbout->UQ_AboutUsers_Exp + 1;
                $r = "UPDATE tblaboutusers SET UQ_AboutUsers_Exp = $MoreXp WHERE FK_Users_AboutUsers = $user->PK_Users";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
        }
    }

    public function insertBaseAboutGroups(int $idgroup): void
    {
        // on récupère la date du jour
        $dateOfTheDay = date('j/m/Y');


        $r = "INSERT INTO tblaboutgroups values(null, :game, :fondation, :FK_UserGroups)";
        $data = [
            ":game" => '',
            ":fondation" => $dateOfTheDay,
            ":FK_UserGroups" => $idgroup
        ];

        if ($this->pdo != null) {
            $stmt = $this->pdo->prepare($r);
            $stmt->execute($data);
        }
    }

    public function updateUserGroup(array $tab, int $idgroup): void
    {
        /*
         * Pour update un groupe il faut update 2 tables
         * tblUserGroups
         * tblAboutGroups
         * car le jeu associé au groupe se trouve dans aboutGroups
         */

        // update UserGroups
        $r = "UPDATE tblUserGroups set 
                UQ_UserGroups_Nom = :nomGroupe,
                UQ_UserGroups_Privacy = :privacy,
                UQ_UserGroups_Description = :bu
                WHERE PK_UserGroups = :idgroups
             ";

        $data = array(
            ":nomGroupe" => $tab['nom'],
            ":privacy" => $tab['privacy'],
            ":bu" => $tab['desc'],
            ":idgroups" => $idgroup
        );

        $stmt = $this->pdo->prepare($r);
        $stmt->execute($data);

        // Update AboutGroups
        $r2 = "
                UPDATE tblAboutGroups set
                UQ_AboutGroups_Game = :game
                WHERE FK_UserGroups_AboutGroups = :idgroup
             ";

        $data2 = array(
            ":game" => $tab['jeu'],
            ":idgroup" => $idgroup
        );

        $stmt = $this->pdo->prepare($r2);
        $stmt->execute($data2);
    }

    public function getUserAboutPreference(int $id): stdClass
    {
        $r = "
          SELECT * FROM tblusers
            INNER JOIN tblaboutusers
            INNER JOIN tbluserpreferences
                WHERE PK_Users = $id
                and tblaboutusers.FK_Users_AboutUsers = $id
                and tbluserpreferences.FK_Users_UserPreferences = $id
        ";

        $stmt = $this->pdo->query($r);
        return $stmt->fetch();

    }

    public function updateUser(array $tab, int $id): void
    {
        $r = "UPDATE tblUsers SET 
                    UQ_Users_Nom = :nom, 
                    UQ_Users_Prenom = :prenom, 
                    UQ_Users_Mail = :mail, 
                    UQ_Users_Age = :age, 
                    UQ_Users_DateNaissance = :dateNaissance 
                WHERE PK_Users = :id";

        $stmt = $this->pdo->prepare($r);
        $stmt->execute([
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":mail" => $tab['mail'],
            ":age" => $tab['age'],
            ":dateNaissance" => $tab['dateNaissance'],
            ":id" => $id
        ]);

    }

    public function updateUserProfile(array $tab, int $id): void
    {
        /*
         * Plusieurs table à update en même temps
         * tblAboutUsers
         * tblUserPreferences
         * tblUsers
         */

        // requête de la table tblAboutUSers
        $updateAboutUsers =
            "UPDATE tblAboutUsers SET 
                    UQ_AboutUsers_GenreFav = :genre, 
                    UQ_AboutUsers_JeuFav = :jeu, 
                    UQ_AboutUsers_Plateforme = :plat
                    WHERE FK_Users_AboutUsers = :id
            ";

        // requête de la table tblUsers
        $updateUsers =
            "UPDATE tblUsers SET
                    UQ_Users_Pseudo = :pseudo,
                    UQ_Users_Bio = :bio
                    WHERE PK_Users = :id
            ";

        // requête de la table UserPreferences
        $updateUserPreferences =
            "UPDATE tblUserPreferences SET
                    UQ_UserPreferences_Discord = :discord,
                    UQ_UserPreferences_Steam = :steam,
                    UQ_UserPreferences_Twitch = :twitch
                    WHERE FK_Users_UserPreferences = :id 
            ";

        // préparation des requêtes en utlisant pdo
        $stmt_updateAboutUser = $this->pdo->prepare($updateAboutUsers);
        $stmt_Users = $this->pdo->prepare($updateUsers);
        $stmt_UserPreferences = $this->pdo->prepare($updateUserPreferences);

        // Exécution de la préparation en passant le tableau associatif
        $stmt_updateAboutUser->execute([
            ":genre" => $tab['genreFav'],
            ":jeu" => $tab['jeufav'],
            ":plat" => $tab['plateforme'],
            ":id" => $id
        ]);

        $stmt_Users->execute(array(
            ":pseudo" => $tab['pseudo'],
            ":bio" => $tab['bio'],
            ":id" => $id
        ));

        $stmt_UserPreferences->execute([
            ":discord" => $tab['discord'],
            ":steam" => $tab['steam'],
            ":twitch" => $tab['twitch'],
            ":id" => $id
        ]);
    }
}