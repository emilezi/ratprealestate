<?php

if((isset($_POST['submit_popup'])) && (isset($_GET['id_tuto'])) && (!empty($_GET['id_tuto'])) && $User->UserSessionAdmin($group_admin) == 0){

    $Tutoriel->deleteTutoriel($db,$_GET['id_tuto']);

    $File->deleteTutoriel($_GET['id_tuto']);

    header('Location: index.php?page=tuto');

}