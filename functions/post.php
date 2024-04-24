<?php

class Post{

    public function newPost($db,$post) {

        $q = $db->prepare("INSERT INTO new(sujet,elements,id_new) VALUES (:sujet,:elements,:id_new)");
        $q->execute([
            'sujet' => $post['title'],
            'elements' => htmlspecialchars($post['elements']),
            'id_new' => md5(microtime(TRUE)*100000)
        ]);

    }

    public function deletePost($db,$id) {

        $q = $db->prepare("DELETE FROM `new` WHERE id_new=:id_new");
        $q->execute([
        'id_new' => $id
        ]);

    }

}

$Post = new Post();