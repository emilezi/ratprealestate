<?php

if(isset($_GET['action']) && !empty($_GET['action'])){

    if($_GET['action'] == "new_app"){
            
        require 'public/page/site_element/admin/new_app.php';
            
    }elseif($_GET['action'] == "new_post"){
            
        require 'public/page/site_element/admin/new_post.php';
            
    }elseif($_GET['action'] == "new_procedure"){
            
        require 'public/page/site_element/admin/new_procedure.php';
            
    }elseif($_GET['action'] == "new_tuto"){
            
        require 'public/page/site_element/admin/new_tuto.php';
            
    }elseif($_GET['action'] == "new_upload"){
            
        require 'public/page/site_element/admin/new_upload.php';
            
    }elseif($_GET['action'] == "apps"){
            
        require 'public/page/site_element/admin/apps.php';
                
    }elseif($_GET['action'] == "idea"){
            
        require 'public/page/site_element/admin/idea.php';
                
    }elseif($_GET['action'] == "new"){
            
        require 'public/page/site_element/admin/new.php';
                
    }else{

        require 'public/page/site_element/admin/panel.php';

    }

}else{

    require 'public/page/site_element/admin/panel.php';

}