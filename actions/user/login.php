<?php

if(isset($_POST['login'])){

    if($Form->LoginCheck($_POST) == 0){

        if($User -> UserLogin($db,$_POST) == 0){

            header('Location: index.php');

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_user.php';

            }else{
    
                require 'public/page/en/error_message/error_user.php';   
    
            }

        }

    }elseif($Form->LoginCheck($_POST) == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_form_temper.php';

        }

        
    
    }else{

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_form.php';

        }else{

            require 'public/page/en/error_message/error_form.php';   

        }
        
    }
    
}