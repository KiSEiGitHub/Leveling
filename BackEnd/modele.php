<?php

/*
C'est dans ce fichier qu'on va appeler nos méthodes
il faut instancier uniquement le modele.php
*/

require 'controller.php';
require 'query.php';

class modele
{
    // On définit nos deux instances
    private $query;
    private $controller;

    public function __construct($host, $db, $user, $mdp)
    {
        $this->query = new query($host, $db, $user, $mdp);
        $this->controller = new controller($host, $db, $user, $mdp);
    }

    public function findById($tbl, $PK, $id, $fetchMode)
    {
        return $this->query->findById($tbl, $PK, $id, $fetchMode);
    }

    public function all($tbl)
    {
        return $this->query->all($tbl);
    }

    public function checkConnexion($tab)
    {
        return $this->controller->checkConnexion($tab);
    }

    public function insertUserGames($tbl, $idUser, $idGame)
    {
        $this->controller->insertUserGames($tbl, $idUser, $idGame);
    }

    public function doubleJointure($tbl1, $tbl2, $PK, $FK, $fetchMethode)
    {
        return $this->query->doubleJointure($tbl1, $tbl2, $PK, $FK, $fetchMethode);
    }

    public function getLvl($lvl)
    {
        return $this->controller->getLvl($lvl);
    }

    public function tripleJointure($table1, $table2, $table3, $PK_Table1, $FK_Table2, $FK_Table3, $fetchMethode)
    {
        return $this->query->tripleJointure($table1, $table2, $table3, $PK_Table1, $FK_Table2, $FK_Table3, $fetchMethode);
    }

    public function quadraJointure($table1, $table2, $table3, $table4, $PK_Table1, $FK_Table2, $FK_Table3, $FK_Table4, $fetchMethode)
    {
        return $this->query->quadraJointure($table1, $table2, $table3, $table4, $PK_Table1, $FK_Table2, $FK_Table3, $FK_Table4, $fetchMethode);
    }

}