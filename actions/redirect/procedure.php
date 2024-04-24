<?php

if($Setting->getLanguage() == 'fr'){

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "procedure"){
                
            require 'public/page/fr/procedure/procedure.php';
                    
        }else{
    
            require 'public/page/fr/procedure/index.php';
    
        }
    
    }else{
    
        require 'public/page/fr/procedure/index.php';
    
    }       

}else{

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "procedure"){
                
            require 'public/page/en/procedure/procedure.php';
                    
        }else{
    
            require 'public/page/en/procedure/index.php';
    
        }
    
    }else{
    
        require 'public/page/en/procedure/index.php';
    
    }   

}