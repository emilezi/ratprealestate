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

require 'actions/reset.php';
require 'actions/user/login.php';

echo "<div id='contents'  class='animpage'>";

    echo "<div class='app-elements-other'>
        <div class='titre-app'>
        <h2>Bienvenue</h2>
        </div>
        <p>Voici un exemple de projet regroupant une majorité des applications utilisées : un ensemble de news sur les projets et développements en cours, une boite à idées pour communiquer avec l'entité IT.</p>
        <p>Vous y trouverez des tutoriels vidéos vous montrant comment solutionner divers problèmes de votre quotidien.</p>
        <p>Vous pouvez aussi utiliser la barre de recherche en entrant les mots-clés décrivant l'objet de votre visite.</p>
        <br/>
        <p><b>Compte administrateur : </b></p>
        <p>Identifiant : administrateur</p>
        <p>Mot de passe : password</p>
        <br/>
        <p><b>Compte utilisateur : </b></p>
        <p>Identifiant : utilisateur</p>
        <p>Mot de passe : password</p>
        <br/>
        <p><b>Source de l'image : </b></p>
        <p><a href='https://www.pexels.com/fr-fr/photo/batiment-en-verre-162539/'>https://www.pexels.com/fr-fr/photo/batiment-en-verre-162539/</a></p>
        <br/>
        <form method='post'>
        <input type='submit' name='reset' id='reset' value='Réinitialiser la démo'>
        </form>
        </div>";



    echo "<div class='app-elements'>
        <div class='titre-app'>
        <h2>Espace compte</h2>
        <div style='width: 180px; height: 10px; background-color:#D75A19; margin-top:10px;'></div>
        </div>
        <p>Connectez-vous à votre compte pour accéder aux services du site vous correspondant</p>
        <form method='post'>
        <input type='text' name='identifiant' id='identifiant' placeholder='Votre identifiant' required style='width:270px;'><br><br>
        <input type='password' name='password' id='password' placeholder='Votre mot de passe' required style='width:270px;'><br><br>
        <input type='checkbox' name='cookies'  id='cookies'>
        <label for='cookies'>Se souvenir de moi</label><br/><br>
        <input type='submit' name='login' id='login' value='Valider'>
        </form>
        </div>";



    $q1 = $db->prepare("SELECT DISTINCT nom_categorie FROM apps WHERE nom_categorie<>'SI' ORDER BY id_apps ASC");
    $q1->execute();
    
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