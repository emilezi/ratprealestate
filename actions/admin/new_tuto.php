<?php

if(isset($_POST['submit']) && $User->UserSessionAdmin($group_admin) == 0){

    if($Form->TutoCheck($_POST) == 0){

        $id = md5(microtime(TRUE)*100000);

        $File->MoveUpload($_POST,$id);

        $elements = str_replace("uploads/temps/", "uploads/tutoriels/".$id."/", $_POST['elements']);

        $Tutoriel->addTutoriel($db,$_POST,$elements,$id);

        header('Location: index.php?page=admin');

    }elseif($Form->TutoCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error.php';
    
    }else{

        require 'public/page/site_element/error_message/error.php';
        
    }

}