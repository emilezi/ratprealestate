<?php

if(isset($_POST['submit']) && $User->UserSessionAdmin($group_admin) == 0){

    if($Form->PostCheck($_POST) == 0){

        $Post->newPost($db,$_POST);

        header('Location: index.php?page=admin');

    }elseif($Form->PostCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error.php';
    
    }else{

        require 'public/page/site_element/error_message/error.php';
        
    }

}