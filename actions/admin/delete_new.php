<?php

$q = $db->prepare("SELECT * FROM new");
$q->execute();

while($new = $q->fetch(PDO::FETCH_ASSOC)){
    
    if(isset($_POST['submit_popup_'.$new['id_new']]) && $User->UserSessionAdmin($group_admin) == 0){

        $Post->deletePost($db,$new['id_new']);

        header('Location: index.php?page=admin&action=new');

    }

}