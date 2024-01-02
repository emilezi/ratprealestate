<?php

class Application{

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

    public function deleteApp($db,$id){

        $q = $db->prepare("DELETE FROM `apps` WHERE id_apps=:id_apps");
        $q->execute([
        'id_apps' => $id
        ]);

    }

}

$Application = new Application();