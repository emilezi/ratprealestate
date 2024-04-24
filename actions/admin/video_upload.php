<?php

if(isset($_POST['submit_video']) && $User->UserSessionAdmin($group_admin) == 0){

    if($File->CheckWriteability() == 0){

        if($File->CheckVideo($_FILES) == 0){

            $File->ImportVideo($_FILES);

            header('Location: index.php?page=admin&action=new_upload');

        }elseif($File->CheckVideo($_FILES) == 1){

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error.php';

            }else{
    
                require 'public/page/en/error_message/error.php';   
    
            }
        
        }elseif($File->CheckVideo($_FILES) == 2){

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error.php';

            }else{
    
                require 'public/page/en/error_message/error.php';   
    
            }
        
        }elseif($File->CheckVideo($_FILES) == 3){

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error.php';

            }else{
    
                require 'public/page/en/error_message/error.php';   
    
            }
        
        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error.php';

            }else{
    
                require 'public/page/en/error_message/error.php';   
    
            }
            
        }

    }else{

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error.php';

        }else{

            require 'public/page/en/error_message/error.php';   

        }

    }

}