<?php

if(isset($_POST['submit_popup']) && $User->UserSessionAdmin($group_admin) == 0){

    $File->deleteTemps();

    header('Location: index.php?page=admin&action=new_upload');

}