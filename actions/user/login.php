<?php

if(isset($_POST['login'])){

    if($Form->LoginCheck($_POST) == 0){

        if($User -> UserLogin($db,$_POST) == 0){

            header('Location: index.php');

        }elseif($User -> UserLogin($db,$_POST) == 1){

            require 'public/page/site_element/error_message/error.php';

        }else{

            require 'public/page/site_element/error_message/error.php';

        }

    }elseif($Form->LoginCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error.php';
    
    }else{

        require 'public/page/site_element/error_message/error.php';
        
    }
    
}