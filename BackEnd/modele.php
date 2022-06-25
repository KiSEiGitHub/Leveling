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
    private query $query;
    private controller $controller;

    public function __construct($host, $db, $user, $mdp)
    {
        $this->query = new query($host, $db, $user, $mdp);
        $this->controller = new controller($host, $db, $user, $mdp);
    }

    public function findById($tbl, $PK, $id, $fetchMode)
    {
        return $this->query->findById($tbl, $PK, $id, $fetchMode);
    }

    public function all(string $tbl): bool|array
    {
        return $this->query->all($tbl);
    }

    public function checkConnexion(array $tab): ?string
    {
        return $this->controller->checkConnexion($tab);
    }

    public function insertUserGames(string $tbl, int $idUser, int $idGame): void
    {
        $this->controller->insertUserGames($tbl, $idUser, $idGame);
    }

    public function doubleJointure(string $tbl1, string $tbl2, string $PK, string $FK, string $fetchMethode, int $id): bool|array
    {
        return $this->query->doubleJointure($tbl1, $tbl2, $PK, $FK, $fetchMethode, $id);
    }

    public function getLvl(string $lvl): ?array
    {
        return $this->controller->getLvl($lvl);
    }

    public function tripleJointure(
        string $table1,
        string $table2,
        string $table3,
        string $PK_Table1,
        string $FK_Table2,
        string $FK_Table3,
        string $fetchMethode,
        int $id
    ): bool|array
    {
        return $this->query->tripleJointure($table1, $table2, $table3, $PK_Table1, $FK_Table2, $FK_Table3, $fetchMethode, $id);
    }

    public function quadraJointure(
        string $table1,
        string $table2,
        string $table3,
        string $table4,
        string $PK_Table1,
        string $FK_Table2,
        string $FK_Table3,
        string $FK_Table4,
        string $fetchMethode
    ): bool|array
    {
        return $this->query->quadraJointure($table1, $table2, $table3, $table4, $PK_Table1, $FK_Table2, $FK_Table3, $FK_Table4, $fetchMethode);
    }

    public function checkCreateGroups(array $tab, $img, $img2): void
    {
        $this->controller->checkCreateGroups($tab, $img, $img2);
    }

    public function getUserGroupsAbout(int $iduser, int $idgroup)
    {
        return $this->query->getUserGroupsAbout($iduser, $idgroup);
    }

    public function insertBaseAboutGroups(int $idgroup): void
    {
        $this->controller->insertBaseAboutGroups($idgroup);
    }

    public function updateUserGroup(array $tab, int $idgroup): void
    {
        $this->controller->updateUserGroup($tab, $idgroup);
    }

    public function checkInsertUser(array $tab, $img, $banner): ? string
    {
        return $this->controller->checkInsertUser($tab, $img, $banner);
    }

    public function getUserAboutPreference(int $id): stdClass
    {
        return $this->controller->getUserAboutPreference($id);
    }

}