<?php

require 'actions/admin/video_upload.php';
require 'actions/admin/picture_upload.php';
require 'actions/admin/delete_upload.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <h2>Import content</h2>
    <button onclick="PopUpVideoUpload();">Import a video</button>
    <button onclick="PopUpPictureUpload();">Import an image</button>
    <button onclick="PopUpRadio();">Erase the content temporarily stored</button>
    <br><br><br>
    <a href='index.php?page=admin&action=new_tuto'><input type="button" name="back" value="Back"></a>

    <?php

echo "</div>";

echo "</div>";