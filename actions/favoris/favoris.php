<?php

$q1 = $db->prepare("SELECT * FROM favoris WHERE matricule=:matricule");
$q1->execute([
    'matricule' => $_SESSION['identifiant']
    ]);

if($q1->rowCount() == 0) {

    if(isset($_SESSION['identifiant']) && in_array($_SESSION['identifiant'], $group_admin)) {
        $q2 = $db->prepare("SELECT * FROM apps ORDER BY id_apps ASC");
        $q2->execute();
    }else{
        $q2 = $db->prepare("SELECT * FROM apps WHERE nom_categorie<>'SI' ORDER BY id_apps ASC");
        $q2->execute();
    }

    while($apps = $q2->fetch(PDO::FETCH_ASSOC)) {

        $Favoris -> newFavoris($db,$apps);

    }

    header('Location: index.php?page=favoris');

}