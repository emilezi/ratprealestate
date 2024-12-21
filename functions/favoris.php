<?php
/**
    * Favoris management class.
    *
    * @author Emile Z.
    */
class Favoris{

    /**
        * New favorite method
        *
        * @param Object database connection
        *
        * @param array apps information
        *
        */
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

    /**
        * Add favorite method
        *
        * @param Object database connection
        *
        * @param int id favorite
        *
        */
    public function addFavoris($db,$id) {

        $q = $db->prepare("UPDATE favoris SET actif=:actif WHERE id=:id");
        $q->execute([
        'actif' => 'yes',
        'id' => $id
        ]);

    }

    /**
        * Delete favorite method
        *
        * @param Object database connection
        *
        * @param int id favorite
        *
        */
    public function deleteFavoris($db,$id) {

        $q = $db->prepare("UPDATE favoris SET actif=:actif WHERE id=:id");
        $q->execute([
        'actif' => 'no',
        'id' => $id
        ]);

    }

}

$Favoris = new Favoris();