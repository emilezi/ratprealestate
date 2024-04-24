<?php

$q = $db->prepare("SELECT * FROM idea WHERE statue=:statue");
$q->execute([
        'statue' => 'approve'
    ]);

while($idea = $q->fetch(PDO::FETCH_ASSOC)){

    $id = $idea['id_idea'];

    if(isset($_POST['submit_delete_'.$id])){

        $Idea->deleteIdea($db,$id);
    
        header('Location: index.php?page=admin&action=idea');
    
    }

}