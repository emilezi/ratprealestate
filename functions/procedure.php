<?php
/**
    * Procedure management class.
    *
    * @author Emile Z.
    */
class Procedure{

    /**
        * New procedure method
        *
        * @param Object database connection
        *
        * @param array post information
        *
        * @param string id information
        *
        */
    public function addProcedure($db,$post,$id){

        $q1 = $db->prepare("INSERT INTO procedures(sujet,categorie,elements,id_procedure) VALUES(:sujet,:categorie,:elements,:id_procedure)");
        $q1->execute([
        'sujet' => $post['title'],
        'categorie' => $post['category'],
        'elements' => 'uploads/procedures/'.$id.'.pdf',
        'id_procedure' => $id
        ]);

        $q2 = $db->prepare("INSERT INTO search(type,categorie,sous_categorie,sujet,elements,link,id_search) VALUES(:type,:categorie,:sous_categorie,:sujet,:elements,:link,:id_search)");
        $q2->execute([
        'type' => 'procedure',
        'categorie' => $post['category'],
        'sous_categorie' => $post['category'],
        'sujet' => $post['title'],
        'elements' => 'uploads/procedures/'.$id.'.pdf',
        'link' => 'index.php?page=procedure&action=procedure&id_procedure='.$id,
        'id_search' => $id
        ]);

    }

    /**
        * Delete procedure method
        *
        * @param Object database connection
        *
        * @param string id information
        *
        */
    public function deleteProcedure($db,$id){

        $q1 = $db->prepare("DELETE FROM `procedures` WHERE id_procedure=:id_procedure");
        $q1->execute([
        'id_procedure' => $id
        ]);
        $q2 = $db->prepare("DELETE FROM `search` WHERE id_search=:id_search");
        $q2->execute([
        'id_search' => $id
        ]);

    }

}

$Procedure = new Procedure();