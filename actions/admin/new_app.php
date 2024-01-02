<?php

if(isset($_POST['submit']) && $User->UserSessionAdmin($group_admin) == 0){

    if($Form->AppCheck($_POST) == 0){

        $Application->addApp($db,$_POST);

        header('Location: index.php?page=admin');

    }elseif($Form->AppCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error.php';
    
    }else{

        require 'public/page/site_element/error_message/error.php';
        
    }

}