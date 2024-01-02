<?php

$q = $db->prepare("SELECT * FROM apps");
$q->execute();

while($app = $q->fetch(PDO::FETCH_ASSOC)){
    
    if(isset($_POST['delApp_'.$app['id_apps']]) && $User->UserSessionAdmin($group_admin) == 0){

        $Application->deleteApp($db,$app['id_apps']);

        header('Location: index.php?page=admin&action=apps');

    }

}