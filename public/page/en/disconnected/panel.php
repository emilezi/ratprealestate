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
        <h2>Welcome</h2>
        </div>
        <p>Here is an example of a project bringing together a majority of the applications used: a set of news on current projects and developments, an ideas box to communicate with the IT entity.</p>
        <p>You will find video tutorials showing you how to solve various problems of your daily life.</p>
        <p>You can also use the search bar by entering the keywords describing the object of your visit.</p>
        <br/>
        <p><b>Administrator account : </b></p>
        <p>Identifier : administrateur</p>
        <p>Password : password</p>
        <br/>
        <p><b>User account : </b></p>
        <p>Identifier : utilisateur</p>
        <p>Password : password</p>
        <br/>
        <p><b>Image source : </b></p>
        <p><a href='https://www.pexels.com/fr-fr/photo/batiment-en-verre-162539/'>https://www.pexels.com/fr-fr/photo/batiment-en-verre-162539/</a></p>
        <br/>
        <button onclick='PopUpRadio()'>Reset the demo</button>
        </div>";



    echo "<div class='app-elements'>
        <div class='titre-app'>
        <h2>Authentication</h2>
        <div style='width: 180px; height: 10px; background-color:#D75A19; margin-top:10px;'></div>
        </div>
        <p>Connect to your account to access the services of the site corresponding to you</p>
        <form method='post'>
        <input type='text' name='identifiant' id='identifiant' placeholder='Your username' required style='width:270px;'><br><br>
        <input type='password' name='password' id='password' placeholder='Your password' required style='width:270px;'><br><br>
        <input type='checkbox' name='cookies'  id='cookies'>
        <label for='cookies'>Remember me</label><br/><br>
        <input type='submit' name='login' id='login' value='To validate'>
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