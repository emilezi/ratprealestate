<?php

$q = $db->prepare("SELECT * FROM idea WHERE statue=:statue");
$q->execute([
        'statue' => 'approve'
    ]);

while($idea = $q->fetch(PDO::FETCH_ASSOC)){

    $id = $idea['id_idea'];
    
    if(isset($_POST['submit_popup_for_'.$id])){

        $Idea->voteIdea($db,$idea, 'for');

        header('Location: index.php?page=idea');
    
    }

}