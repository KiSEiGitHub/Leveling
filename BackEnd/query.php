<?php

/*
La class query va servir à créer toutes les requêtes nue, c'est pour optimiser et éviter les répétitions !
*/


class query
{
    // On définit une variable qui servir d'instance pour notre class PDO
    private $pdo;

    public function __construct($host, $dbname, $root, $mdp)
    {
        // on la définit à null au début car elle va nous servir à controller si on s'est bien connecté
        $this->pdo = null;

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

    /* -------------------------------------------------------------------------- */

    // findById = recherche par ID
    public function findById($tbl, $PK, $id, $fetchMode)
    {

        /*
        La fonction prend 3 params
        $tbl -> le nom de la table
        $PK -> Primary Key
        $id -> l'id le int
        */

        $stmt = $this->pdo->query("SELECT * FROM {$tbl} WHERE {$PK} = {$id}");

        switch ($fetchMode) {
            case 'all' :
            {
                return $stmt->fetchAll();
            }
            case 'fetch':
            {
                return $stmt->fetch();
            }
        }

    }

    /* -------------------------------------------------------------------------- */
    // all = select * from
    public function all(string $tbl): bool|array
    {

        /*
        La fonction prend 1 param
        $tbl -> le nom de la table
        */

        /*
            De base :
            1. $requete
            2. prepare
            3. execute
            4. fetch

            La je fais tout d'un coup
        */
        return $this->pdo->query("SELECT * FROM {$tbl}")->fetchAll();
    }

    // Fonction qui fait une jointure sur deux table
    public function doubleJointure(string $tbl1, string $tbl2, string $PK_tbl1, string $FK_tbl2, string $fetchMethode, int $id): array
    {
        $query = "
          SELECT * FROM {$tbl1}
            INNER JOIN {$tbl2}
                WHERE {$tbl1}.{$PK_tbl1} = $id
                    and $id = {$tbl2}.{$FK_tbl2}
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        switch ($fetchMethode) {
            case 'all':
            {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            case 'fetch':
            {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        return [];

    }

    public function tripleJointure(string $table1, string $table2, string $table3, string $PK_Table1, string $FK_Table2, string $FK_Table3, string $fetchMethode): array
    {
        $query =
            "
               SELECT * FROM {$table1}
                INNER JOIN {$table2} 
                INNER JOIN {$table3} 
                     WHERE {$table1}.{$PK_Table1} = {$table2}.{$FK_Table2} 
                       and {$table2}.{$FK_Table2} = {$table3}.{$FK_Table3}
            ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        switch ($fetchMethode) {
            case 'all':
            {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            case 'fetch':
            {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        return [];
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
    ): array|bool
    {
        $query =
            "
               SELECT * FROM {$table1}
                INNER JOIN {$table2} 
                INNER JOIN {$table3} 
                INNER JOIN {$table4}
                     WHERE {$table1}.{$PK_Table1} = {$table2}.{$FK_Table2} 
                        and {$table2}.{$FK_Table2} = {$table3}.{$FK_Table3}
                        and {$table3}.{$FK_Table3} = {$table4}.{$FK_Table4}
            ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        switch ($fetchMethode) {
            case 'all':
            {
                return $stmt->fetchAll();
            }
            case 'fetch':
            {
                return $stmt->fetch();
            }
        }

        return false;
    }

    public function getUserGroupsAbout(int $iduser, int $idgroup)
    {
        $r = "SELECT * from tblusers 
                INNER JOIN tblusergroups 
                INNER JOIN tblaboutgroups 
                    WHERE tblusers.PK_Users = {$iduser}
                        and tblusergroups.PK_UserGroups = $idgroup
                        and tblaboutgroups.FK_UserGroups_AboutGroups = $idgroup
             ";
        $stmt = $this->pdo->query($r);
        $stmt->execute();
        return $stmt->fetch();
    }
}