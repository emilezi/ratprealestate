<?php

require 'actions/admin/new_procedure.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form enctype="multipart/form-data" method="post">
        <p>Enter the name of the procedure</p>
        <input type='text' name='title' placeholder='Example: General Data Protection Regulations' required>
        <p>Procedure category</p>
            <select name ='category'>
                <option value ='Charte entreprise'>Business charter
                <option value ='Informatique'>Computer science
                <option value ='Juridique'>Legal
            </select>
        <p>Import a PDF document</p>
        <input type='file' name='pdf'/>
        <br><br><br>
        <input type='submit' name='submit_pdf' value='Save'>
    </form>

    <?php

echo "</div>";

echo "</div>";