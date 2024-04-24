<?php

require 'actions/idea/vote_against.php';
require 'actions/idea/vote_for.php';

echo "<div id='contents'>";

    $q1 = $db->prepare("SELECT * FROM idea WHERE statue=:statue");
    $q1->execute([
        'statue' => 'approve'
    ]);

    if($q1->rowCount() == 0){

        echo "<div class='elements'>";

        echo "<p>Aucunes idées à afficher pour l'instant</p>";

        echo "</div>";

    }else{

        $i = 0;

        while($idea = $q1->fetch(PDO::FETCH_ASSOC)){

            $i++;

            echo "<div class='elements'>";

            echo "<div id=idea".$i.">
            <h1>".$idea['titre']."</h1>
            <p>".$idea['contenue']."</p>
            <p>Publiée le : ".$idea['date_idea']."</p>
            <br>";

            if(isset($_SESSION['identifiant'])){

                $q2 = $db->prepare("SELECT * FROM idea_vote WHERE matricule=:matricule AND idea_name=:idea_name");
                $q2->execute([
                    'matricule' => $_SESSION['identifiant'],
                    'idea_name' => $idea['titre']
                    ]);

                if($q2->fetch() == !true){
            
                    ?>

                    <button onclick="PopUpVoteFor('<?=$idea['id_idea']?>');">Voté pour</button>
                    <button onclick="PopUpVoteAgainst('<?=$idea['id_idea']?>');">Voté contre</button>

                    <?php

                }else{
                
                    echo "<p>Cette idée à été votée</p>";

                }

            }

            echo "</div>";

            echo "</div>";

        }

    }

echo "</div>";