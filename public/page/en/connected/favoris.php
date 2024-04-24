<?php

require 'actions/favoris/favoris.php';

require 'actions/favoris/favoris_add.php';

require 'actions/favoris/favoris_delete.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    echo "<h2>Favorite</h2>";

    echo "<div style='width: 120px; height: 14px; background-color:#732387;'></div>";

    echo "<div id='app-favoris-no'>";

    $q = $db->prepare("SELECT * FROM favoris WHERE matricule=:matricule AND actif=:actif");
    $q->execute([
    'matricule' => $_SESSION['identifiant'],
    'actif' => 'no'
    ]);

    if($q->rowCount() == 0) {
    
        echo "<p>There is nothing to display</p>";
    
    }else{

        while($favori = $q->fetch(PDO::FETCH_ASSOC)){

        echo "<div class='app-favoris'>
            <a><img class='app-fond' src='uploads/icones/" . $favori['img'] . "' width:95px; ></a>
            <div class='app-favoris-right'>
            <p>".$favori['application']."</p>
            <form method='post'>
            <input type='submit' name='addApp".$favori['id']."' id='addApp".$favori['id']."' value='Add'>
            </form>
            </div>
            </div>";

        }

    }

    echo "</div>";
    
    echo "<div id='app-favoris-yes'>";

    $q = $db->prepare("SELECT * FROM favoris WHERE matricule=:matricule AND actif=:actif");
    $q->execute([
    'matricule' => $_SESSION['identifiant'],
    'actif' => 'yes'
    ]);

    if($q->rowCount() == 0) {
    
        echo "<p>You have so far been favorite to display</p>";
    
    }else{

        while($favori = $q->fetch(PDO::FETCH_ASSOC)){

        echo "<div class='app-favoris'>
            <a><img class='app-fond' src='uploads/icones/" . $favori['img'] . "' width:95px; ></a>
            <div class='app-favoris-right'>
            <p>".$favori['application']."</p>
            <form method='post'>
            <input type='submit' name='delApp".$favori['id']."' id='delApp".$favori['id']."' value='Withdraw'>
            </form>
            </div>
            </div>";

        }

    }

    echo "</div>";

echo "</div>";

echo "</div>";