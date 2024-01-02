<?php

require 'public/page/page_element/high_page.php';

if($Database->CheckConnection() == 0) {

    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    global $db;

    if($Database->CheckTables($db) == 0){

        session_start();
    
        if($User->UserSession() == 0)
        {
    
            //$IP->getConnection($db);
    
            require 'public/page/page_element/nav_bar.php';
    
            if(isset($_GET['page']) && !empty($_GET['page'])){
    
                if($_GET['page'] == "admin" && in_array($_SESSION['identifiant'], $group_admin)){

                    require 'actions/redirect/admin.php';
            
                }elseif($_GET['page'] == "tuto"){

                    require 'actions/redirect/tuto.php';
            
                }elseif($_GET['page'] == "procedure"){

                    require 'actions/redirect/procedure.php';
            
                }elseif($_GET['page'] == "contact"){
    
                    require 'public/page/site_element/contact.php';
    
                }elseif($_GET['page'] == "favoris"){
    
                    require 'public/page/site_element/connected/favoris.php';
    
                }elseif($_GET['page'] == "idea"){
    
                    require 'public/page/site_element/connected/idea.php';
    
                }elseif($_GET['page'] == "new"){
    
                    require 'public/page/site_element/connected/new.php';
    
                }elseif($_GET['page'] == "new_idea"){
    
                    require 'public/page/site_element/connected/new_idea.php';
    
                }elseif($_GET['page'] == "rgpd"){
    
                    require 'public/page/site_element/rgpd.php';
    
                }else{
    
                    require 'public/page/site_element/connected/panel.php';
    
                }
            
            }elseif(isset($_GET['q']) && !empty($_GET['q'])){
                    
                require 'public/page/site_element/search.php';
            
            }else{
            
                require 'public/page/site_element/connected/panel.php';
            
            }
            
    
        }elseif($User->UserSession() == 1){
    
            require 'public/page/page_element/nav_bar.php';
    
            if(isset($_GET['page']) && !empty($_GET['page'])){
    
                if($_GET['page'] == "tuto"){

                    require 'actions/redirect/tuto.php';
            
                }elseif($_GET['page'] == "procedure"){

                    require 'actions/redirect/procedure.php';
            
                }elseif($_GET['page'] == "contact"){
    
                    require 'public/page/site_element/contact.php';
    
                }elseif($_GET['page'] == "rgpd"){
    
                    require 'public/page/site_element/rgpd.php';
    
                }else{
    
                    require 'public/page/site_element/disconnected/panel.php';
    
                }
            
            }elseif(isset($_GET['q']) && !empty($_GET['q'])){
                    
                require 'public/page/site_element/search.php';
            
            }else{
            
                require 'public/page/site_element/disconnected/panel.php';
            
            }
    
        }elseif($User->UserSession() == 2){
    
            session_destroy();
    
            header('Location: index.php');
    
        }
    
    }else{
    
        $Database -> addTables($db);
    
    }

}else{

    //require

}

require 'public/page/page_element/down_page.php';

?>