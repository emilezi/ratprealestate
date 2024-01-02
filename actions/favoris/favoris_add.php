<?php

$q = $db->prepare("SELECT * FROM favoris WHERE matricule=:matricule AND actif=:actif");
$q->execute([
    'matricule' => $_SESSION['identifiant'],
    'actif' => 'no'
    ]);

while($favori = $q->fetch(PDO::FETCH_ASSOC)){

    if(isset($_POST['addApp'.$favori['id']])){

        $Favoris->addFavoris($db,$favori['id']);

        header('Location: index.php?page=favoris');

    }

}