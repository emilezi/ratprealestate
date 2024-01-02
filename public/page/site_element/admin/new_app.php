<?php

require 'actions/admin/new_app.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form enctype="multipart/form-data" method="post">
        <p>Entrer le nom de l'application</p>
        <input type='text' name='name'  placeholder='Exemple : Wellco' required>
        <p>Entrer la description de l'application</p>
        <textarea name='description' placeholder='Exemple : outil de gestion en ligne des espaces de travail'></textarea>
        <p>Entrer l'url de l'application</p>
        <input type='text' name='link'  placeholder='Exemple : https://exemple.fr' required>
        <p>Catégorie de l'application</p>
            <select name ='category'>
                <option value ='SI'> SI
                <option value ='Applications communes'> Applications communes
                <option value ='Social - RH'> Social - RH
            </select>
        <br><br>
        <input type='submit' name='submit' value='Enregistrer'>
    </form>

    <?php

echo "</div>";

echo "</div>";