<?php

require 'actions/admin/new_procedure.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form enctype="multipart/form-data" method="post">
        <p>Entrer le nom de la procédure</p>
        <input type='text' name='title' placeholder='Exemple : Règlement général de la protection des données' required>
        <p>Catégorie de la procédure</p>
            <select name ='category'>
                <option value ='Charte entreprise'>Charte entreprise
                <option value ='Informatique'>Informatique
                <option value ='Juridique'>Juridique
            </select>
        <p>Importer un document PDF</p>
        <input type='file' name='pdf'/>
        <br><br><br>
        <input type='submit' name='submit_pdf' value='Enregistrer'>
    </form>

    <?php

echo "</div>";

echo "</div>";