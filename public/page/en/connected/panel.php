<?php

$q = $db->prepare("SELECT * FROM new ORDER BY id DESC");
$q->execute();
if($q->rowCount() > 0){
    $i = 0;
    echo "<a href='index.php?page=new'>
        <div class='messagedefilant'>
        <div><span>";
    while ($new = $q->fetch(PDO::FETCH_ASSOC)) {
        $i++;
        echo "  -  ".$new['elements'];
    }
    echo "</span></div>
        </div></a>";
}

require 'actions/user/logout.php';

echo "<div id='contents' class='animpage'>";

    echo "<div class='app-elements-other'>
            <div class='titre-app'>
            <h2>Favorite</h2>
            <div style='width:170px; height: 10px; background-color:#F0AA00; margin-top:10px;'></div>
            <br>
            <a href='index.php?page=favoris'>
            <input type='submit' id='fav' value='Manage my favorites'>
            </a>
            </div>";

    $q = $db->prepare("SELECT * FROM favoris WHERE matricule=:matricule AND actif=:actif LIMIT 6");
    $q->execute([
    'matricule' => $_SESSION['identifiant'],
    'actif' => 'yes'
    ]);

    if($q->rowCount() == 0) {

        echo "<p>You currently have no application defined as favorites</p>";

    }else{

        echo "<div class='app-contents'>";

    while($app = $q->fetch(PDO::FETCH_ASSOC)){

        echo "<div class='app'>
        <a href='" . $app['link'] . "' target='_blank' >
        <img class='app-fond' src='uploads/icones/" . $app['img'] . "' width:95px; >
        </a>
        <p>" . $app['application'] . "</p>
        </div>";

    }

        echo "</div>";

    }

    echo "</div>";

    echo "<div class='app-elements'>
        <div class='titre-app'>
        <h2>My account</h2>
        <div style='width: 150px; height: 10px; background-color:#D75A19; margin-top:10px;'></div>
        </div>
        <p>Welcome " . $_SESSION['prenom'] . "</p>
        <p>My ID : " . $_SESSION['identifiant'] . "</p>";

    if(isset($_SESSION['identifiant']) && in_array($_SESSION['identifiant'], $group_admin)) {
        echo "<a href='index.php?page=admin'><p><span style='color:red'>Administration interface</span></p></a>";
    }

    echo "<form method='post'>
        <input type='submit' name='logout' id='logout' value='Sign out'>
        </form>
        </div>";



    echo "<div class='app-elements'>
    <div class='titre-app'>
    <h2>Ideas</h2>
    <div style='width: 55px; height: 10px; background-color:#D72864;'></div>
    </div>";

    echo "<p>An idea ? Proposals to submit? Click below.
        <form method='post' action='index.php?page=new_idea'>
        <input type='submit' name='new_idea' id='new_idea' value='Poster an idea'>
        </form>
        </p>";

    $q2 = $db->prepare("SELECT * FROM idea WHERE statue=:statue ORDER BY id DESC");
    $q2->execute(['statue' => 'approve']);
    if ($q2->rowCount() == 0) {
        echo '<p>No idea to display for the moment</p>';
    }else{
        $i = 0;
        while($idea = $q2->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            echo "<a href='index.php?page=idea'>
                <h3>" . $idea['titre'] . "</h3>
                <p>Published on <span style='color:black'>: " . $idea['date_idea'] . "</p>
                </a>";
        }
    }

    echo "</div>";



    if(isset($_SESSION['identifiant']) && in_array($_SESSION['identifiant'], $group_admin)) {
        $q1 = $db->prepare("SELECT DISTINCT nom_categorie FROM apps ORDER BY id_apps ASC");
        $q1->execute();
    }else{
        $q1 = $db->prepare("SELECT DISTINCT nom_categorie FROM apps WHERE nom_categorie<>'SI' ORDER BY id_apps ASC");
        $q1->execute();
    }

    $IntroApps = "";

    while($categ_apps = $q1->fetch(PDO::FETCH_ASSOC)) {

        $IntroApps .= "<div class='app-elements'>
            <div class='titre-app'>
            <h2>" . $categ_apps['nom_categorie'] . "</h2>
            <div style='width: 120px; height: 10px; background-color:#F5D750; margin-top:10px;'></div>
            </div> ";
        $IntroApps .= "<div class='app-contents'>";
        $q2 = $db->prepare("SELECT * FROM apps WHERE nom_categorie=:nom_categorie ORDER BY id_apps ASC");
        $q2->execute([
            'nom_categorie' => $categ_apps['nom_categorie']
        ]);
            while($rowApp = $q2->fetch(PDO::FETCH_ASSOC)) {
                $IntroApps .= "<div class='app'>
                    <a href='" . $rowApp['lien_apps'] . "' title='" . $rowApp['description'] . "' target='_blank' >
                    <img class='app-fond' src='uploads/icones/" . $rowApp['img'] . "' width:95px; >
                    </a>
                    <p>" . $rowApp['nom_apps'] . "</p>
                    </div>";
            }
        $IntroApps .= "</div>";
        $IntroApps .= "</div>";

    }

    echo $IntroApps;

echo "</div>";