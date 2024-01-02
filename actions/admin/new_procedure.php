<?php

if(isset($_POST['submit_pdf']) && $User->UserSessionAdmin($group_admin) == 0){

    if($File->CheckWriteability() == 0){

        if($File->CheckPDF($_FILES) == 0){

            $id = md5(microtime(TRUE)*100000);

            $File->ImportPDF($_FILES,$id);

            $Procedure->addProcedure($db,$_POST,$id);

            header('Location: index.php?page=admin');

        }elseif($File->CheckPDF($_FILES) == 1){
    
            require 'public/page/site_element/error_message/error.php';
        
        }elseif($File->CheckPDF($_FILES) == 2){
    
            require 'public/page/site_element/error_message/error.php';
        
        }elseif($File->CheckPDF($_FILES) == 3){
    
            require 'public/page/site_element/error_message/error.php';
        
        }else{
    
            require 'public/page/site_element/error_message/error.php';
            
        }

    }else{

        require 'public/page/site_element/error_message/error.php';

    }

}