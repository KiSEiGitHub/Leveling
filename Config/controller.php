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

        try {
            $this->pdo = new PDO("mysql:host=" . $server . ";dbname=" . $dbname, $user, $password);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de donnée";
            echo $e->getMessage();
        }

    }


    // méthodes
    public function insertUser($tab, $img)
    {
        $r = "insert into user values(null, :nom, :prenom, :password, :age, :pseudo, :bio, :img, :role, :dateNaissance, :mail, :lvl)";
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
            ":lvl" => 1
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
        $r = 'SELECT * FROM user WHERE pseudo LIKE "%' . $recherche . '%" ORDER BY id DESC';
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
        $r = "SELECT * from user_preferences where id_user = $iduser";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($r);
            $select->execute();
            //extraction de tous les users
            return $select->fetchAll();
        } else {
            return null;
        }
    }

}