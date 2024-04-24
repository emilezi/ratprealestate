<?php

if(isset($_POST['submit_popup'])){

    $File->UploadsReset();

    $Database->DatabaseReset($db);

    $Database->addTables($db);

    header('Location: index.php');

}