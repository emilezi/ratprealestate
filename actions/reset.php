<?php

if(isset($_POST['reset'])){

    $Database->DatabaseReset($db);

    $Database->addTables($db);

    header('Location: index.php');

}