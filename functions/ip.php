<?php
/**
    * IP management class.
    *
    * @author Emile Z.
    */
class IP{

    /**
        * Get the connection ip address
        *
        * @return string ip address
        *
        */
    public function getIp() {

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
            $ip = $_SERVER['REMOTE_ADDR'];
                    
        return $ip;

    }

    /**
        * Get the machine information
        *
        * @return string machine information
        *
        */
    public function getMachine() {

        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if(stristr($useragent,'Macintosh')){$machine="Mac";}
        elseif(stristr($useragent,'Win')){$machine="Windows";}
        elseif(stristr($useragent,'iPhone')){$machine="iPhone";}
        elseif(stristr($useragent,'iPod')){$machine="iPod";}
        elseif(stristr($useragent,'Android')){$machine="Android";}
        elseif(stristr($useragent,'iPad')){$machine="iPad";}
        elseif(stristr($useragent,'linux')){$machine="Linux";}
        else{$machine="inconnu";}

        return $machine;

    }

    /**
        * Get the agent information
        *
        * @return string agent information
        *
        */
    public function getAgent() {

        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if(stristr($useragent,'Chrome')){$navigateur="Chrome";}
        elseif(stristr($useragent,'Camino')){$navigateur="Camino";}
        elseif(stristr($useragent,'Firefox')){$navigateur="Firefox";}
        elseif(stristr($useragent,'Safari')){$navigateur="Safari";}
        elseif(stristr($useragent,'MSIE')){$navigateur="Explorer";}
        elseif(stristr($useragent,'Opera')){$navigateur="Opera";}
        elseif(stristr($useragent,'Epiphany')){$navigateur="Epiphany";}
        elseif(stristr($useragent,'ChromePlus')){$navigateur="ChromePlus";}
        elseif(stristr($useragent,'Lynx')){$navigateur="Lynx";}
        else{$navigateur="inconnu";}

        return $navigateur;

    }

}

$IP = new IP();