<?php

require 'actions/admin/delete_application.php';

echo "<div id='contents'>";

    $q = $db->prepare("SELECT * FROM apps");
    $q->execute();

    if($q->rowCount() == 0){

        echo "<div class='elements'>";

        echo "<p>No application to display for the moment</p>";

        echo "</div>";

    }else{

    $i = 0;

    echo "<div class='elements'>";

    echo "<h2>Applications</h2>";

    echo "<div style='width: 120px; height: 14px; background-color:#732387;'></div>";

    echo "<div class='apps-admin'>";

    while($apps = $q->fetch(PDO::FETCH_ASSOC)){
        
        echo "<div class='app-admin'>
            <a><img class='app-fond' src='uploads/icones/" . $apps['img'] . "' width:95px; ></a>
            <div class='app-admin-right'>
            <p>".$apps['nom_apps']."</p>
            <form method='post'>
            <input type='submit' name='delApp_".$apps['id_apps']."' id='delApp_".$apps['id_apps']."' value='Withdraw'>
            </form>
            </div>
            </div>";

    }

    echo "</div>";

    echo "</div>";

    }

echo "</div>";