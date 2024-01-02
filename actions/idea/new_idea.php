<?php

if(isset($_POST['submit'])){

    if($Form->IdeaCheck($_POST) == 0){

        $Idea->addIdea($db,$_POST,$IP->getIp());

        header('Location: index.php');

    }elseif($Form->IdeaCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error.php';
    
    }else{

        require 'public/page/site_element/error_message/error.php';
        
    }

}