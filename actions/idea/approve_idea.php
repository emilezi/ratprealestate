<?php

$q = $db->prepare("SELECT * FROM idea WHERE statue=:statue");
$q->execute([
        'statue' => 'poste'
    ]);

while($idea = $q->fetch(PDO::FETCH_ASSOC)){

    $id = $idea['id_idea'];
    
    if(isset($_POST['submit_approuve_'.$id])){

        if($Form->PostEdit($_POST) == 0){
    
            $Idea->approveIdea($db,$_POST,$id);

            $Mail->approveIdea($_POST);
    
            header('Location: index.php?page=admin&action=idea');
    
        }elseif($Form->PostEdit($_POST) == 1){
    
            require 'public/page/site_element/error_message/error.php';
        
        }else{
    
            require 'public/page/site_element/error_message/error.php';
            
        }
    
    }

}