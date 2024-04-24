<?php

if($Setting->getLanguage() == 'fr'){

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "tutoriel"){
                
            require 'public/page/fr/tuto/tutoriel.php';
                    
        }else{
    
            require 'public/page/fr/tuto/index.php';
    
        }
    
    }else{
    
        require 'public/page/fr/tuto/index.php';
    
    }       

}else{

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "tutoriel"){
                
            require 'public/page/en/tuto/tutoriel.php';
                    
        }else{
    
            require 'public/page/en/tuto/index.php';
    
        }
    
    }else{
    
        require 'public/page/en/tuto/index.php';
    
    }   

}