<?php
/**
    * User management class.
    *
    * @author Emile Z.
    */
class User{

    /**
        * Checking the session information of the active connection
        *
        * @return int if the login information of the active user is valid, otherwise return the error
        *
        */
    public function UserSession(){

        if
        (
            isset($_SESSION['identifiant'])
            &&
            isset($_SESSION['prenom'])
            &&
            isset($_SESSION['nom'])
            &&
            isset($_SESSION['email'])
        )
        {
        
            return 0;
    
        }
        elseif
        (
            isset($_SESSION['identifiant'])
            ||
            isset($_SESSION['prenom'])
            ||
            isset($_SESSION['nom'])
            ||
            isset($_SESSION['email'])
        )
        {
    
            return 2;
    
        }else{
    
            return 1;
    
        }
    
    }

    /**
        * Checking the session admin information of the active connection
        *
        * @return int if the login information of the active user is valid, otherwise return the error
        *
        */
    public function UserSessionAdmin($group_admin){

        if
        (
            isset($_SESSION['identifiant'])
            &&
            in_array($_SESSION['identifiant'], $group_admin)
            &&
            isset($_SESSION['prenom'])
            &&
            isset($_SESSION['nom'])
            &&
            isset($_SESSION['email'])
        )
        {
        
            return 0;
    
        }
        elseif
        (
            isset($_SESSION['identifiant'])
            ||
            isset($_SESSION['prenom'])
            ||
            isset($_SESSION['nom'])
            ||
            isset($_SESSION['email'])
        )
        {
    
            return 2;
    
        }else{
    
            return 1;
    
        }
    
    }

    /**
        * User session creation
        *
        * @param Object database connection
        *
        * @param array form login
        *
        * @return int if the information entered is valid create the session, otherwise return the corresponding error
        *
        */
    public function UserLogin($db,$post){

        if(($post['identifiant'] == "administrateur") && ($post['password'] == "password")){

            $_SESSION['identifiant'] = "administrateur";
            $_SESSION['email'] = "administrateur@exemple.com";
            $_SESSION['prenom'] = "Emile";
            $_SESSION['nom'] = "Z.";
            if(isset($post['cookies'])) {
                setcookie("identifiant", "administrateur", time() + 3600 * 24 * 7);
                setcookie("email", "administrateur@exemple.com", time() + 3600 * 24 * 7);
                setcookie("prenom", "Emile", time() + 3600 * 24 * 7);
                setcookie("nom", "Z.", time() + 3600 * 24 * 7);
            }

        }elseif(($post['identifiant'] == "utilisateur") && ($post['password'] == "password")){

            $_SESSION['identifiant'] = "utilisateur";
            $_SESSION['email'] = "utilisateur@exemple.com";
            $_SESSION['prenom'] = "Emile";
            $_SESSION['nom'] = "Z.";
            if(isset($post['cookies'])) {
                setcookie("identifiant", "utilisateur", time() + 3600 * 24 * 7);
                setcookie("email", "utilisateur@exemple.com", time() + 3600 * 24 * 7);
                setcookie("prenom", "Emile", time() + 3600 * 24 * 7);
                setcookie("nom", "Z.", time() + 3600 * 24 * 7);
            }

        }else{

            /*

            $ldapServer = "exemple.fr";
            $ldapPort = "389";
            $dn = "CN=" . $post['identifiant'] . ",OU=EXEMPLE,OU=Filiales,OU=Utilisateurs,DC=exemple,DC=fr";
            $mdp = $post['password'];
            $conn = ldap_connect($ldapServer, $ldapPort);
            $attr = array("givenname", "sn", "cn", "userprincipalname");
            $filter = "sAMAccountName=" . $post['identifiant'];
            if($conn) {
                ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
                $bindServerLDAP = @ldap_bind($conn, $dn, $mdp);
                if($bindServerLDAP) {
                    $result = ldap_search($conn, $dn, $filter, $attr);
                    $entries = ldap_get_entries($conn, $result);
                    $_SESSION['identifiant'] = utf8_decode($entries[0]["cn"][0]);
                    $_SESSION['email'] = utf8_decode($entries[0]["userprincipalname"][0]);
                    $_SESSION['prenom'] = utf8_decode($entries[0]["givenname"][0]);
                    $_SESSION['nom'] = utf8_decode($entries[0]["sn"][0]);
                    if(isset($post['cookies'])) {
                        setcookie("identifiant", utf8_decode($entries[0]["cn"][0]), time() + 3600 * 24 * 7);
                        setcookie("email", utf8_decode($entries[0]["userprincipalname"][0]), time() + 3600 * 24 * 7);
                        setcookie("prenom", utf8_decode($entries[0]["givenname"][0]), time() + 3600 * 24 * 7);
                        setcookie("nom", utf8_decode($entries[0]["sn"][0]), time() + 3600 * 24 * 7);
                    }
    
                    return 0;
    
                }else{
    
                    return 1;
    
                }
    
            }else{
    
                return 2;
    
            }
    
            ldap_close($conn);

            */

            return 1;

        }
    
    }

}

$User = new User();