<?php

class Favoris{

    public function newFavoris($db,$apps) {

        $q1 = $db->prepare("INSERT INTO favoris(matricule,application,link,img,actif) VALUES(:matricule,:application,:link,:img,:actif)");
        $q1->execute([
            'matricule' => $_SESSION['identifiant'],
            'application' => $apps['nom_apps'],
            'link' => $apps['lien_apps'],
            'img' => $apps['img'],
            'actif' => 'no'
            ]);

    }

    public function addFavoris($db,$id) {

        $q = $db->prepare("UPDATE favoris SET actif=:actif WHERE id=:id");
        $q->execute([
        'actif' => 'yes',
        'id' => $id
        ]);

    }

    public function deleteFavoris($db,$id) {

        $q = $db->prepare("UPDATE favoris SET actif=:actif WHERE id=:id");
        $q->execute([
        'actif' => 'no',
        'id' => $id
        ]);

    }

}

$Favoris = new Favoris();