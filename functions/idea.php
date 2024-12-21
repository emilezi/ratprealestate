<?php
/**
    * Idea management class.
    *
    * @author Emile Z.
    */
class Idea{

    /**
        * New idea method
        *
        * @param Object database connection
        *
        * @param array post information
        *
        * @param string ip information
        *
        */
    public function addIdea($db,$post,$ip){

        $q = $db->prepare("INSERT INTO idea(titre,matricule,contenue,statue,motif,id_idea,adress_ip) VALUES (:titre,:matricule,:contenue,:statue,:motif,:id_idea,:adress_ip)");
		$q->execute([
            'titre' => $post['title'],
            'matricule' => $_SESSION['identifiant'],
            'contenue' => $post['elements'],
            'statue' => 'poste',
            'motif' => 'aucun',
            'id_idea' => md5(microtime(TRUE)*100000),
            'adress_ip' => $ip
		]);

    }

    /**
        * Approve idea method
        *
        * @param Object database connection
        *
        * @param array post information
        *
        * @param string id information
        *
        */
    public function approveIdea($db,$post,$id){

        $q = $db->prepare("UPDATE idea SET statue=:statue, motif=:motif WHERE id_idea=:id_idea");
        $q->execute([
            'motif' => $post['post_comment'],
            'statue' => 'approve',
            'id_idea' => $id
        ]);

    }

    /**
        * Refuse idea method
        *
        * @param Object database connection
        *
        * @param array post information
        *
        * @param string id information
        *
        */
    public function refuseIdea($db,$post,$id){

        $q = $db->prepare("UPDATE idea SET statue=:statue, motif=:motif WHERE id_idea=:id_idea");
		$q->execute([
			'motif' => $post['post_comment'],
			'statue' => 'delete',
			'id_idea' => $id
		]);

    }

    /**
        * Delete idea method
        *
        * @param Object database connection
        *
        * @param string id information
        *
        */
    public function deleteIdea($db,$id){

        $q = $db->prepare("UPDATE idea SET statue=:statue WHERE id_idea=:id_idea");
		$q->execute([
			'statue' => 'delete',
			'id_idea' => $id
		]);

    }

    /**
        * Vote idea method
        *
        * @param Object database connection
        *
        * @param array idea information
        *
        * @param string vote value
        *
        */
    public function voteIdea($db,$idea, $value){

        $q = $db->prepare("INSERT INTO idea_vote(matricule,idea_name,vote) VALUES (:matricule,:idea_name,:vote)");
        $q->execute([
            'matricule' => $_SESSION['identifiant'],
            'idea_name' => $idea['titre'],
            'vote' => $value
        ]);

    }

}

$Idea = new Idea();