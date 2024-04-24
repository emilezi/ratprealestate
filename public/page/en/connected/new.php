<?php

echo "<div id='contents'>";

    $q = $db->prepare("SELECT * FROM new ORDER BY id DESC ");
    $q->execute();

    if($q->rowCount() == 0){

        echo "<div class='elements'>";

        echo "<p>None New to display for the moment</p>";

        echo "</div>";

    }else{

        $i = 0;

        while($new = $q->fetch(PDO::FETCH_ASSOC)){

            $i++;

            echo "<div class='elements'>";

            echo "<div id=new".$i.">
            <h1>".$new['sujet']."</h1>
            <p>".$new['elements']."</p>
            <p>Published on : ".$new['date_new']."</p>";
            echo "</div>";

            echo "</div>";

        }

    }

echo "</div>";