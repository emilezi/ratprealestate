<?php

if(isset($_GET['action']) && !empty($_GET['action'])){

    if($_GET['action'] == "tutoriel"){
            
        require 'public/page/site_element/tuto/tutoriel.php';
                
    }else{

        require 'public/page/site_element/tuto/index.php';

    }

}else{

    require 'public/page/site_element/tuto/index.php';

}