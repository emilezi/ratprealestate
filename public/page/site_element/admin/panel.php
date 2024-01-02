<?php

echo "<div id='contents'>";

    echo "<div class='app-elements'>
        <h2>Administration</h2>
        <div style='width:170px; height: 14px; background-color:#D72864;'></div>
        <p>Bienvenue sur l'interface d'administration du site. Sur cette page vous trouverez tous les éléments nécessaires pour administrer le site</p>
        </div>";



    echo "<div class='app-elements'>
        <h2>Gestion des applications</h2>
        <div style='width: 260px; height: 14px; background-color:#D75A19;'></div>";
    
    $q1 = $db->prepare("SELECT * FROM apps LIMIT 3");
    $q1->execute();
    
    if ($q1->rowCount() == 0) {
    
        echo '<p>Aucune application à afficher pour l\'instant</p>';
    
    }else{
    
        $i = 0;
    
    echo "<div class='app-contents'>";

    while($app = $q1->fetch(PDO::FETCH_ASSOC)){

        echo "<a href='index.php?page=admin&action=apps'>
        <div class='app'>
        <img class='app-fond' src='uploads/icones/" . $app['img'] . "' width:95px; >
        <p>" . $app['nom_apps'] . "</p>
        </div>
        </a>";

    }

    echo "</div>";

    }

    echo "</div>";
    
    
    
    echo "<div class='app-elements'>
        <h2>Gestion des news</h2>
        <div style='width: 190px; height: 14px; background-color:#F0AA00;'></div>";
        
        $q1 = $db->prepare("SELECT * FROM new");
        $q1->execute();
        
        if ($q1->rowCount() == 0) {
        
            echo '<p>Aucunes new à afficher pour l\'instant</p>';
        
        }else{
        
            $i = 0;
        
        echo "<div class='overflow'>";

        while($new = $q1->fetch(PDO::FETCH_ASSOC)){

            $i++;
        
            echo "<a href='index.php?page=admin&action=new'>
            <h3>".$new['sujet']."</h3>
            <p>Publiée le : ".$new['date_new']."</p>
            </a>";

        }

        echo "</div>";

        }

    echo "</div>";



    echo "<div class='app-elements'>
        <h2>Idées</h2>
        <div style='width: 50px; height: 14px; background-color:#69A505;'></div>";

        $q2 = $db->prepare("SELECT * FROM idea WHERE statue=:statue1 UNION SELECT * FROM idea WHERE statue=:statue2");
        $q2->execute([
            'statue1' => 'poste',
            'statue2' => 'approve'
        ]);

        if ($q2->rowCount() == 0) {

        echo '<p>Aucune idée à afficher pour l\'instant</p>';

        }else{

            $i = 0;

            echo "<div class='overflow'>";

        while($idea = $q2->fetch(PDO::FETCH_ASSOC)){

            $i++;
            
            echo "<a href='index.php?page=admin&action=idea'>";
            echo "<h3>".$idea['titre']."</h3>";
            echo "<p>".$idea['contenue']."</p>";
            echo "<p>Publiée le : ".$idea['date_idea']."</p>";
            echo "</a>";

        }

        echo "</div>";

        }

    echo "</div>";



    echo "<div class='app-elements'>
        <h2>Nouveau</h2>
        <div style='width: 100px; height: 14px; background-color:#00A0BE;'></div>
        <p>Créer un nouvel élément sur le site</p>
        <a href='index.php?page=admin&action=new_app'><h3>Application</h3></a>
        <a href='index.php?page=admin&action=new_procedure'><h3>Procédure</h3></a>
        <a href='index.php?page=admin&action=new_tuto'><h3>Tutoriel</h3></a>
        <a href='index.php?page=admin&action=new_post'><h3>News</h3></a>
        </div>";


        
    echo "<div class='app-elements'>
        <h2>Statistiques</h2>
        <div style='width: 130px; height: 14px; background-color:#EBA0C8;'></div>";
        $qs1 = $db->prepare("SELECT * FROM connexions");
        $qs1->execute();
        $qs2 = $db->prepare("SELECT * FROM tutoriel");
        $qs2->execute();
        $qs3 = $db->prepare("SELECT * FROM idea WHERE statue=:statue1 OR statue=:statue2");
        $qs3->execute([
                'statue1' => 'approve',
                'statue2' => 'poste'
            ]);
    echo "<p>Nombre de connexions de compte effectué :".$qs1->rowCount()."</p>
        <p>Nombre de tutoriels postés :".$qs2->rowCount()."</p>
        <p>Nombre d'idées postées :".$qs3->rowCount()."</p>
        </div>";

echo "</div>";