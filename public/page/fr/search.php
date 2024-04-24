<?php

echo "<div id='contents'>";

echo "<div class='elements'>
    <h3>Rechercher</h3>
    <div style='width: 100px; height: 14px; background-color:#69A505;'></div>";

if(isset($_GET['q']) && !empty($_GET['q'])) {

    $q = htmlspecialchars($_GET['q']);

    $search_data = $db->prepare("SELECT * FROM `search` WHERE `elements` LIKE '%".$q."%' OR `sujet` LIKE '%".$q."%' OR `categorie` LIKE '%".$q."%' OR `date_search` LIKE '%".$q."%'");
    $search_data->execute();
    
    if($search_data->rowCount() > 0) {

        while($a = $search_data->fetch(PDO::FETCH_ASSOC)) { 

        echo "<a href='" . $a['link'] . "'><h3> " . $a['type'] . " - " . $a['categorie'] . " - " . $a['sujet'] . " - " .$a['date_search']. "</h3></a>";

        }

        echo "</div>";

    }else{ 

        echo "<p>Aucun resultats pour : " . $_GET['q'] . "...</p>";

    }


}else{

    echo "<p>Saisissez une recherche dans la barre de recherche</p>";

}

echo "</div>";

echo "</div>";