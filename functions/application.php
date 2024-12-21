<?php
/**
    * Application management class.
    *
    * @author Emile Z.
    */
class Application{

    /**
        * New app method
        *
        * @param Object database connection
        *
        * @param array post information
        *
        */
    public function addApp($db,$post){

        $q = $db->prepare("INSERT INTO apps(nom_apps,lien_apps,img,description,nom_categorie) VALUES (:nom_apps,:lien_apps,:img,:description,:nom_categorie)");
        $q->execute([
        'nom_apps' => $post['name'],
        'lien_apps' => $post['link'],
        'img' => 'app.png',
        'description' => $post['description'],
        'nom_categorie' => $post['category']
        ]);

    }

    /**
        * Delete app method
        *
        * @param Object database connection
        *
        * @param string id app
        *
        */
    public function deleteApp($db,$id){

        $q = $db->prepare("DELETE FROM `apps` WHERE id_apps=:id_apps");
        $q->execute([
        'id_apps' => $id
        ]);

    }

}

$Application = new Application();