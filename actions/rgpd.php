<?php

if(isset($_POST['rgpd'])){

    $RGPD->RGPDacceptance($IP,$db);

    header('Location: index.php');

}