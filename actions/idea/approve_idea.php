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
    
        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_form.php';

            }else{
    
                require 'public/page/en/error_message/error_form.php';
    
            }
        
        }
    
    }

}