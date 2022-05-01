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
        $r = "insert into user values(null, :nom, :prenom, :password, :age, :pseudo, :bio, :img, :role)";
        $data = array(
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":password" => $tab['mdp'],
            ":age" => $tab['age'],
            ":pseudo" => $tab['pseudo'],
            ":bio" => $tab['bio'],
            ":img" => $img,
            ":role" => 'admin', // ça faudra changer sur "user" quand on aura crée tous les trois nos comptes
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

}