<?php

if((isset($_POST['submit_popup'])) && (isset($_GET['id_procedure'])) && (!empty($_GET['id_procedure'])) && $User->UserSessionAdmin($group_admin) == 0){

    $Procedure->deleteProcedure($db,$_GET['id_procedure']);

    $File->deleteProcedure($_GET['id_procedure']);

    header('Location: index.php?page=procedure');

}