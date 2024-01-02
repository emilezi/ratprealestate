<?php

require 'actions/admin/video_upload.php';
require 'actions/admin/picture_upload.php';
require 'actions/admin/delete_upload.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <h2>Importer du contenu</h2>
    <button onclick="PopUpVideoUpload();">Importer une vidéo</button>
    <button onclick="PopUpPictureUpload();">Importer une image</button>
    <button onclick="PopUpRadio();">Effacer le contenu temporairement stocké</button>
    <br><br><br>
    <a href='index.php?page=admin&action=new_tuto'><input type="button" name="back" value="Retour"></a>

    <?php

echo "</div>";

echo "</div>";