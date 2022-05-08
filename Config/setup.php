<?php

class setup
{
    public function FakeImage($img,$chemin)
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
    
}