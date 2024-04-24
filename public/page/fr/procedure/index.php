<?php

echo "<div id='contents'>";

echo "<div class='elements'>";

    $q1 = $db->prepare("SELECT DISTINCT categorie FROM procedures");
    $q1->execute();

    if ($q1->rowCount() !== 0) {

        $i = 0;

        while($procedure = $q1->fetch(PDO::FETCH_ASSOC)){

        echo "<h3>".$procedure['categorie']."</h3>";

        $i = $i + 1;
        $q2 = $db->prepare("SELECT * FROM procedures WHERE categorie=:categorie");
        $q2->execute([
        'categorie' => $procedure['categorie']
        ]);

            while($procedure = $q2->fetch(PDO::FETCH_ASSOC)){
                
            echo "<p><a href='index.php?page=procedure&action=procedure&id_procedure=".$procedure['id_procedure']."'>".$procedure['sujet']."</a></p>";

            }

        }

    }else{
        echo "<p>Aucune procédure disponible pour le moment</p>";
    }

echo "</div>";

echo "</div>";