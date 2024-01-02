<?php

echo "<div id='contents'>";

echo "<div class='elements'>";

    echo "<div id='tuto-menu'>";

    $q1 = $db->prepare("SELECT DISTINCT categorie FROM tutoriel");
    $q1->execute();

    if ($q1->rowCount() !== 0) {

        $i = 0;

        while($tuto = $q1->fetch(PDO::FETCH_ASSOC)){

        echo "<h3>".$tuto['categorie']."</h3>";

        $i = $i + 1;
        $q2 = $db->prepare("SELECT * FROM tutoriel WHERE categorie=:categorie");
        $q2->execute([
        'categorie' => $tuto['categorie']
        ]);

            while($tuto = $q2->fetch(PDO::FETCH_ASSOC)){
                
            echo "<p><a href='index.php?page=tuto&action=tutoriel&id_tuto=".$tuto['id_tuto']."'>".$tuto['sujet']."</a></p>";

            }

        }

    }else{
        echo "<p>Aucun tutoriel disponible pour le moment</p>";
    }

    echo "</div>";

    echo "<div id='tuto-app'>";

    echo "<div class='tuto-app'>
        <img class='tuto-app-fond' src='ressources/img/icones/Outlook.png' width:150px;>
        <p>Outlook</p>
        </div>";
    echo "<div class='tuto-app'>
        <img class='tuto-app-fond' src='ressources/img/icones/MicrosoftTeams.png' width:150px;>
        <p>Teams</p>
        </div>";
    echo "<div class='tuto-app'>
        <img class='tuto-app-fond' src='ressources/img/icones/WebPage.png' width:150px;>
        <p>Softphonie</p>
        </div>";
    echo "<div class='tuto-app'>
        <img class='tuto-app-fond' src='ressources/img/icones/WebPage.png' width:150px;>
        <p>Non categorisé</p>
        </div>";

    echo "</div>";

echo "</div>";

echo "</div>";