<?php

require 'actions/admin/delete_new.php';

echo "<div id='contents'>";

    $q = $db->prepare("SELECT * FROM new ORDER BY id DESC ");
    $q->execute();

    if($q->rowCount() == 0){

        echo "<div class='elements'>";

        echo "<p>Aucunes new à afficher pour l\'instant</p>";

        echo "</div>";

    }else{

        $i = 0;

        while($new = $q->fetch(PDO::FETCH_ASSOC)){

            $i++;

            echo "<div class='elements'>";

            echo "<div id=new".$i.">
            <h1>".$new['sujet']."</h1>
            <p>".$new['elements']."</p>
            <p>Publiée le : ".$new['date_new']."</p>
            <br>";

            ?>

            <button onclick="PopUpNew('<?=$new['id_new']?>');">Supprimer</button>

            <?php
            
            echo "</div>";

            echo "</div>";

        }

    }

echo "</div>";