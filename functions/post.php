<?php
/**
    * Post management class.
    *
    * @author Emile Z.
    */
class Post{

    /**
        * New post method
        *
        * @param Object database connection
        *
        * @param array post information
        *
        */
    public function newPost($db,$post) {

        $q = $db->prepare("INSERT INTO new(sujet,elements,id_new) VALUES (:sujet,:elements,:id_new)");
        $q->execute([
            'sujet' => $post['title'],
            'elements' => htmlspecialchars($post['elements']),
            'id_new' => md5(microtime(TRUE)*100000)
        ]);

    }

    /**
        * Delete post method
        *
        * @param Object database connection
        *
        * @param string id post
        *
        */
    public function deletePost($db,$id) {

        $q = $db->prepare("DELETE FROM `new` WHERE id_new=:id_new");
        $q->execute([
        'id_new' => $id
        ]);

    }

}

$Post = new Post();