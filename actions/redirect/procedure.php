<?php

if(isset($_GET['action']) && !empty($_GET['action'])){

    if($_GET['action'] == "procedure"){
            
        require 'public/page/site_element/procedure/procedure.php';
                
    }else{

        require 'public/page/site_element/procedure/index.php';

    }

}else{

    require 'public/page/site_element/procedure/index.php';

}