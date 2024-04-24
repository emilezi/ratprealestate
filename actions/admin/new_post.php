<?php

if(isset($_POST['submit']) && $User->UserSessionAdmin($group_admin) == 0){

    if($Form->PostCheck($_POST) == 0){

        $Post->newPost($db,$_POST);

        header('Location: index.php?page=admin');

    }elseif($Form->PostCheck($_POST) == 1){

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