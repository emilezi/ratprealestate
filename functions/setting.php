<?php
/**
    * Setting management class.
    *
    * @author Emile Z.
    */
class Setting{

    /**
        * Get language settings
        *
        * @return string language
        *
        */
    public function getLanguage(){

        if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "fr"){
    
            return "fr";
        
        }else{
        
            return "en";
        
        }
    
    }

}

$Setting = new Setting();

?>