<?php

if(isset($_POST['submit_video']) && $User->UserSessionAdmin($group_admin) == 0){

    if($File->CheckWriteability() == 0){

        if($File->CheckVideo($_FILES) == 0){

            $File->ImportVideo($_FILES);

            header('Location: index.php?page=admin&action=new_upload');

        }elseif($File->CheckVideo($_FILES) == 1){
    
            require 'public/page/site_element/error_message/error.php';
        
        }elseif($File->CheckVideo($_FILES) == 2){
    
            require 'public/page/site_element/error_message/error.php';
        
        }elseif($File->CheckVideo($_FILES) == 3){
    
            require 'public/page/site_element/error_message/error.php';
        
        }else{
    
            require 'public/page/site_element/error_message/error.php';
            
        }

    }else{

        require 'public/page/site_element/error_message/error.php';

    }

}