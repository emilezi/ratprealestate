<?php

require 'actions/admin/delete_procedure.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    if(isset($_GET['id_procedure']) && !empty($_GET['id_procedure'])){

        $q = $db->prepare("SELECT * FROM procedures WHERE id_procedure=:id_procedure");
        $q->execute(['id_procedure' => $_GET['id_procedure']]);
        $procedure = $q->fetch();

        if($procedure == true){

            echo "<embed src='".$procedure['elements']."' type='application/pdf'/>";

            if(isset($_SESSION['identifiant']) && in_array($_SESSION['identifiant'], $group_admin)){
                echo "<br><br>";
                echo "<button onclick='PopUpRadio()'>Delete</button>";
            }

        }else{

            echo "<p>The search procedure does not exist</p>";

        }

    }else{

        echo "<p>The search procedure does not exist</p>";

    }

echo "</div>";

echo "</div>";