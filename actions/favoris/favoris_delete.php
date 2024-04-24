<?php

$q1 = $db->prepare("SELECT * FROM favoris WHERE matricule=:matricule AND actif=:actif");
$q1->execute([
    'matricule' => $_SESSION['identifiant'],
    'actif' => 'yes'
    ]);

while($apps = $q1->fetch(PDO::FETCH_ASSOC)){

    if(isset($_POST['delApp'.$apps['id']])){

        $Favoris->deleteFavoris($db,$apps['id']);

        header('Location: index.php?page=favoris');

    }

}