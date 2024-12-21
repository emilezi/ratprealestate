<?php
/**
    * Mail management class.
    *
    * @author Emile Z.
    */
class Mail{

    /**
        * Send email approval of idea method
        *
        * @param array post information
        *
        */
    public function approveIdea($post) {

        $destinataire = $_SESSION['identifiant']."@ratprealestate.com" ;
        $sujet = "Validation de l'idée" ;
        $entete = "From: postmaster@ratprealestate.com" ;
        $message = "Votre idée à bien été approuvée et est dès à présent visible depuis l'espace \"IDÉE\" de l'intranet RRE
        ------------------------------
        Commentaire de l'approbateur :
        ".$post['post_comment'];

        mail($destinataire, $sujet, $message, $entete);

    }

    /**
        * Send email delete idea method
        *
        * @param array post information
        *
        */
    public function deleteIdea($post) {

        $destinataire = $_SESSION['identifiant']."@ratprealestate.com" ;
        $sujet = "Suppression de l'idée" ;
        $entete = "From: postmaster@ratprealestate.com" ;
        $message = "Votre idée à bien été approuvée et est dès à présent visible depuis l'espace \"IDÉE\" de l'intranet RRE
        ------------------------------
        Commentaire de l'approbateur :
        ".$post['post_comment'];

        mail($destinataire, $sujet, $message, $entete);

    }

}

$Mail = new Mail();