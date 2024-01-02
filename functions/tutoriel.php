<?php

class Tutoriel{

    public function addTutoriel($db,$post,$elements,$id){

        $q1 = $db->prepare("INSERT INTO tutoriel(sujet,categorie,elements,id_tuto) VALUES(:sujet,:categorie,:elements,:id_tuto)");
        $q1->execute([
        'sujet' => $post['title'],
        'categorie' => $post['category'],
        'elements' => $elements,
        'id_tuto' => $id
        ]);

        $q2 = $db->prepare("INSERT INTO search(type,categorie,sous_categorie,sujet,elements,link,id_search) VALUES(:type,:categorie,:sous_categorie,:sujet,:elements,:link,:id_search)");
        $q2->execute([
        'type' => 'tutoriel',
        'categorie' => $post['category'],
        'sous_categorie' => $post['category'],
        'sujet' => $post['title'],
        'elements' => $post['elements'],
        'link' => 'index.php?page=tuto&action=tutoriel&id_tuto='.$id,
        'id_search' => $id
        ]);

    }

    public function deleteTutoriel($db,$id){

        $q1 = $db->prepare("DELETE FROM `tutoriel` WHERE id_tuto=:id_tuto");
        $q1->execute([
        'id_tuto' => $id
        ]);
        $q2 = $db->prepare("DELETE FROM `search` WHERE id_search=:id_search");
        $q2->execute([
        'id_search' => $id
        ]);

    }

}

$Tutoriel = new Tutoriel();