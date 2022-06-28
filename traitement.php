<?php
session_start();

// import des constante
require 'constante.php';

// appel de la classe
require 'BackEnd/modele.php';

$modele = new modele(HOST, DB, USER, MDP);


// page de traitement des données des formulaires.
// l'action des formulaire doit toujours renvoyer cette page

// traitement inscription
if (isset($_POST['btn-inscription'])) {
    $msg = $modele->checkInsertUser($_POST, $_FILES['img'], $_FILES['imgbanner']);
    header("Location: inscription.php?msg=$msg");
}


// traitement de Connexion
if (isset($_POST['btn_Connexion'])) {
    $msgConnexion = $modele->checkConnexion($_POST);
    header("Location: Connexion.php?msg=$msgConnexion");
}