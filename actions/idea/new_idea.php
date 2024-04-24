<?php

if(isset($_POST['submit'])){

    if($Form->IdeaCheck($_POST) == 0){

        $Idea->addIdea($db,$_POST,$IP->getIp());

        header('Location: index.php');

    }elseif($Form->IdeaCheck($_POST) == 1){

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