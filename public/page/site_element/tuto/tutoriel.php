<?php

require 'actions/admin/delete_tuto.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    if(isset($_GET['id_tuto']) && !empty($_GET['id_tuto'])){

        $q = $db->prepare("SELECT * FROM tutoriel WHERE id_tuto=:id_tuto");
        $q->execute(['id_tuto' => $_GET['id_tuto']]);
        $tuto = $q->fetch();

        if($tuto == true){

            echo $tuto['elements'];

            if(isset($_SESSION['identifiant']) && in_array($_SESSION['identifiant'], $group_admin)){
                echo "<br><br>";
                echo "<button onclick='PopUpRadio()'>Supprimer</button>";
            }

        }else{

            echo "<p>Le tutoriel rechercher n'existe pas</p>";

        }

    }else{

        echo "<p>Le tutoriel rechercher n'existe pas</p>";

    }

echo "</div>";

echo "</div>";