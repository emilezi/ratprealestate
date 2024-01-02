<?php

require 'actions/idea/approve_idea.php';
require 'actions/idea/refuse_idea.php';
require 'actions/idea/delete_idea.php';

echo "<div id='contents'>";

    $q1 = $db->prepare("SELECT * FROM idea WHERE statue=:statue1 UNION SELECT * FROM idea WHERE statue=:statue2");
    $q1->execute([
        'statue1' => 'poste',
        'statue2' => 'approve'
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

        echo "<div id=idea".$i.">";
        echo "<h1>".$idea['titre']."</h1>";
        echo "<div style='word-wrap: break-word;'><p>".$idea['contenue']."</p></div>";
        echo "<p>Statue de l'idée : ".$idea['statue']."  |  Publiée le : ".$idea['date_idea']."</p>
        <br><br>";
        
        if($idea['statue'] == 'poste'){

            echo "<div class='btn-content'>";

            ?>

            <button onclick="PopUpRefuse('<?=$idea['id_idea']?>');">Supprimer</button>

            <button onclick="PopUpApprove('<?=$idea['id_idea']?>');">Approuver</button>

            <?php

            echo "</div>";

        }elseif($idea['statue'] == 'approve'){

            $q2 = $db->prepare("SELECT * FROM idea_vote WHERE idea_name=:idea_name");
            $q2->execute([
                'idea_name' => $idea['titre']
            ]);

            echo "<p>Nombre de votes pour : ".$q2->rowCount()."</p>
            <br>";

            echo "<div class='btn-content'>";

            ?>

            <button onclick="PopUpDelete('<?=$idea['id_idea']?>');">Supprimer</button>

            <?php

            echo "</div>";

        }

        echo "</div>";

        echo "</div>";

    }

    }

echo "</div>";