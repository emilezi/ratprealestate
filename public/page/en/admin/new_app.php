<?php

require 'actions/admin/new_app.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form enctype="multipart/form-data" method="post">
        <p>Enter the name of the application</p>
        <input type='text' name='name'  placeholder='Example : Wellco' required>
        <p>Enter the description of the application</p>
        <textarea name='description' placeholder='Example : online management tool for workspaces'></textarea>
        <p>Enter the application URL</p>
        <input type='text' name='link'  placeholder='Example : https://exemple.fr' required>
        <p>Application category</p>
            <select name ='category'>
                <option value ='SI'> SI
                <option value ='Applications communes'> Applications communes
                <option value ='Social - RH'> Social - RH
            </select>
        <br><br>
        <input type='submit' name='submit' value='Save'>
    </form>

    <?php

echo "</div>";

echo "</div>";