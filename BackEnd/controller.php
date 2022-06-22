<?php

class controller
{
    // variables
    public $pdo;

    // Constructor
    public function __construct($server, $dbname, $user, $password)
    {
        // on met ça à null pour controler plus tard si la connexion à la bdd sera succès ou pas
        $this->pdo = null;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO("mysql:host=" . $server . ";dbname=" . $dbname, $user, $password, $options);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de donnée";
            echo $e->getMessage();
        }

    }


    // méthodes
    public function getUserGroups()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user_groups INNER JOIN user WHERE user_groups.creator = user.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getCate()
    {
        $r = "select * from categorie";
        if ($this->pdo != null) {
            $r2 = $this->pdo->prepare($r);
            $r2->execute();
            return $r2->fetchAll();
        } else {
            return "pas bon";
        }
    }


    public function insertUser($tab, $img, $banner)
    {
        $r = "insert into user values(null, :nom, :prenom, :password, :age, :pseudo, :bio, :img, :role, :dateNaissance, :mail, :lvl, :banner)";
        $data = array(
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":password" => md5($tab['mdp']),
            ":age" => $tab['age'],
            ":pseudo" => $tab['pseudo'],
            ":bio" => $tab['bio'],
            ":img" => $img,
            ":role" => 'admin', // ça faudra changer sur "user" quand on aura crée tous les trois nos comptes
            ":dateNaissance" => $tab['dateNaissance'],
            ":mail" => $tab['mail'],
            ":lvl" => 1,
            ":banner" => $banner
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
        }
    }

    public function insertGame($tab, $img_pp, $img_banner, $img_others)
    {
        $r = "insert into games values(null, :name, :description, :genre, :plateforme, :date_sortie, :note_test, :note_avis, :modele_eco, :classification, 
        :prix, :img_pp, :img_banner, :img_others)";
        $data = array(
            ":name" => $tab['name'],
            ":description" => $tab['description'],
            ":genre" => $tab['genre'],
            ":plateforme" => $tab['plateforme'],
            ":date_sortie" => $tab['date_sortie'],
            ":note_test" => $tab['note_test'],
            ":note_avis" => $tab['note_avis'],
            ":modele_eco" => $tab['modele_eco'],
            ":classification" => $tab['classification'],
            ":prix" => $tab['prix'],
            ":img_pp" => $img_pp,
            ":img_banner" => $img_banner,
            ":img_others" => $img_others,

        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
        }
    }

    // fonction qui récupère UN SEUL utilisateur
    public function getUser($id)
    {
        $r = "select * from user where id =" . $id;
        if ($this->pdo != null) {
            $r2 = $this->pdo->prepare($r);
            $r2->execute();
            return $r2->fetch();
        } else {
            return "pas bon";
        }
    }

    public function getAllUsers()
    {
        $requete = "select * from user;";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($requete);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function Login($pseudo)
    {
        $r = "select * from user where pseudo ='$pseudo'";
        if ($this->pdo != null) {
            $r2 = $this->pdo->prepare($r);
            $r2->execute();
            return $r2->fetch();
        } else {
            return "pas bon";
        }
    }


    public function searchUser($recherche)
    {
        $r = "SELECT * FROM user WHERE pseudo LIKE '%$recherche%' ORDER BY DESC ";
        if ($this->pdo != null) {
            $r2 = $this->pdo->prepare($r);
            $r2->execute();
            return $r2->fetch();
        } else {
            return "erryu";
        }
    }

    public function selectAllPays()
    {
        $requete = "select * from pays;";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($requete);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function getAllGames()
    {
        $requete = "select * from games;";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($requete);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function OneGame($id)
    {
        $r = 'SELECT * FROM games WHERE idinsert_games =' . $id;
        if ($this->pdo != null) {
            $r2 = $this->pdo->prepare($r);
            $r2->execute();
            return $r2->fetch();
        } else {
            return "err";
        }
    }

    public function InsertPreference($iduser, $tab)
    {
        $r = "INSERT INTO user_preferences values(null, :iduser, :steam, :discord, :twitch)";
        $data = array(
            ":iduser" => $iduser,
            ":steam" => $tab['steam'],
            ":discord" => $tab['discord'],
            ":twitch" => $tab['twitch']
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
        }
    }

    public function getUserPreference($iduser)
    {
        $r = "SELECT * from user_preferences where id_user = {$iduser}";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetch();
        } else {
            return [];
        }
    }

    public function insertGroups($iduser, $tab, $img, $banner)
    {
        $r = "INSERT INTO user_groups values(null, :nom, :privacy, :creator, :img, :banner, :jeux, :desc)";
        $data = array(
            ":nom" => $tab['nomgroupe'],
            ":privacy" => $tab['privacy'],
            ":creator" => $iduser,
            ":img" => $img,
            ":jeux" => $tab['jeux'],
            ":banner" => $banner,
            ":desc" => $tab['description']
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
            $this->addUserXp($iduser, 'Addgroup');
        }

    }

    public function getGroups($iduser)
    {
        $r = "SELECT * from user_groups where creator = $iduser";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function getOneGroups($id)
    {
        $r = "SELECT * from user_groups where id = $id";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function insertGameWish($user, $game)
    {
        $r = "INSERT INTO user_wish values(null, :games, :user)";
        $data = array(
            ":games" => $game,
            ":user" => $user
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
            $this->addUserXp($user, 'AddGamesWish');
        }
    }

    public function insertGameUser($user, $game)
    {
        $r = "INSERT INTO user_games values(null, :games, :user)";
        $data = array(
            ":games" => $game,
            ":user" => $user
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
            $this->addUserXp($user, 'AddGames');
        }
    }

    public function selectGameWish($iduser)
    {
        $r = "SELECT * FROM user_wish WHERE id_user = $iduser";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function selectGameUser($iduser)
    {
        $r = "SELECT * FROM user_games WHERE id_user = $iduser";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function getOneGame($id)
    {
        $r = "SELECT * FROM games where idinsert_games = $id";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function updateUserPreference($tab, $iduser)
    {
        // User
        $r = "
                UPDATE user SET
                    nom = :nom,
                    prenom = :prenom,
                    age = :age,
                    pseudo = :pseudo,
                    bio = :bio,
                    DateDeNaissance = :date,
                    mail = :mail
                WHERE id = $iduser
            ";
        $data = array(
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            "age" => $tab['age'],
            ":pseudo" => $tab['pseudo'],
            ":bio" => $tab['bio'],
            ":date" => $tab['DateNaissance'],
            ":mail" => $tab['mail']
        );

        // About
        $r2 = "
                UPDATE about SET
                     exp = 0,
                     jeux_possede = 0,
                     jeux_termine = 0,
                     jeux_cent = 0,
                     jeu_fav = :jeu,
                     genre_fav = :genre,
                     plateforme_fav = :plate
                WHERE id_user = $iduser
            ";

        $data2 = array(
            ":jeu" => $tab['jeux'],
            ":genre" => $tab['genre'],
            ":plate" => $tab['platforme']
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
            $insert2 = $this->pdo->prepare($r2);
            $insert2->execute($data2);
        }

    }

    public function getUserAbout($iduser)
    {
        $r = "SELECT * FROM about WHERE id_user = $iduser";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function insertBaseUserAbout($iduser)
    {
        $dateInscription = date('d/m/Y');
        $r = "INSERT INTO about values(null, 0,0,0,0,'','','','$dateInscription', $iduser)";

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute();
        }
    }

    public function addUserXp($iduser, $action)
    {
        // récupérer la table about d'un user
        $UserAbout = $this->getUserAbout($iduser);
        $id = $UserAbout['id_user'];


        switch ($action) {
            case 'Addgroup':
            {
                $MoreXp = $UserAbout['exp'] + 10;
                $r = "UPDATE about SET exp = $MoreXp WHERE id_user = $id";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
            case 'AddGames' :
            {
                $MoreXp = $UserAbout['exp'] + 5;
                $r = "UPDATE about SET exp = $MoreXp WHERE id_user = $id";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
            case 'AddGamesWish' :
            {
                $MoreXp = $UserAbout['exp'] + 3;
                $r = "UPDATE about SET exp = $MoreXp WHERE id_user = $id";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
            case 'UpdateGroups' :
            {
                $MoreXp = $UserAbout['exp'] + 1;
                $r = "UPDATE about SET exp = $MoreXp WHERE id_user = $id";
                if ($this->pdo != null) {
                    $insert = $this->pdo->prepare($r);
                    $insert->execute();
                    break;
                }
            }
        }
    }

    public function updateGroupPeference($tab, $idgroup)
    {
        $g = $this->getOneGroups($idgroup);
        $user = $g['creator'];

        $r = "
                UPDATE about_groups SET
                    jeu = :jeu
                WHERE id_groups = $idgroup
            ";

        $r2 = "
            UPDATE user_groups SET
                nom = :nom,
                privacy = :pv
        ";

        $data = array(
            ":jeu" => $tab['jeu']
        );

        $data2 = array(
            ":nom" => $tab['nom'],
            ":pv" => $tab['privacy']
        );

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute($data);
            $insert2 = $this->pdo->prepare($r2);
            $insert2->execute($data2);
            $this->addUserXp($user, 'UpdateGroups');
        }
    }

    public function insertBaseGroupsPreference($idgroups)
    {
        $dateFondation = date('d/m/Y');
        $r = "INSERT INTO about_groups values(null, '', 0, '$dateFondation', $idgroups)";

        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($r);
            $insert->execute();
        }
    }

    public function getGroupAbout($idgroup)
    {
        $r = "SELECT * FROM about_groups WHERE id_groups =" . $idgroup;
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetch();
        } else {
            return null;
        }
    }
}