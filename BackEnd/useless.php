<?php

public
function insertGame($tab, $img_pp, $img_banner, $img_others)
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