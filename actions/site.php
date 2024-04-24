<?php

session_start();

require 'public/site/high_page.php';

if($Database->CheckConnection() == 0) {

    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    global $db;

    if($Database->CheckTables($db) == 0){

        if($Setting->getLanguage() == 'fr'){

            if($User->UserSession() == 0)
            {
        
                //$IP->getConnection($db);
        
                require 'public/site/fr/nav_bar.php';
        
                if(isset($_GET['page']) && !empty($_GET['page'])){
        
                    if($_GET['page'] == "admin" && in_array($_SESSION['identifiant'], $group_admin)){
    
                        require 'actions/redirect/admin.php';
                
                    }elseif($_GET['page'] == "tuto"){
    
                        require 'actions/redirect/tuto.php';
                
                    }elseif($_GET['page'] == "procedure"){
    
                        require 'actions/redirect/procedure.php';
                
                    }elseif($_GET['page'] == "contact"){
        
                        require 'public/page/fr/contact.php';
        
                    }elseif($_GET['page'] == "favoris"){
        
                        require 'public/page/fr/connected/favoris.php';
        
                    }elseif($_GET['page'] == "idea"){
        
                        require 'public/page/fr/connected/idea.php';
        
                    }elseif($_GET['page'] == "new"){
        
                        require 'public/page/fr/connected/new.php';
        
                    }elseif($_GET['page'] == "new_idea"){
        
                        require 'public/page/fr/connected/new_idea.php';
        
                    }elseif($_GET['page'] == "rgpd"){
        
                        require 'public/page/fr/rgpd.php';
        
                    }else{
        
                        require 'public/page/fr/connected/panel.php';
        
                    }
                
                }elseif(isset($_GET['q']) && !empty($_GET['q'])){
                        
                    require 'public/page/fr/search.php';
                
                }else{
                
                    require 'public/page/fr/connected/panel.php';
                
                }
                
        
            }elseif($User->UserSession() == 1){
        
                require 'public/site/fr/nav_bar.php';
        
                if(isset($_GET['page']) && !empty($_GET['page'])){
        
                    if($_GET['page'] == "tuto"){
    
                        require 'actions/redirect/tuto.php';
                
                    }elseif($_GET['page'] == "procedure"){
    
                        require 'actions/redirect/procedure.php';
                
                    }elseif($_GET['page'] == "contact"){
        
                        require 'public/page/fr/contact.php';
        
                    }elseif($_GET['page'] == "rgpd"){
        
                        require 'public/page/fr/rgpd.php';
        
                    }else{
        
                        require 'public/page/fr/disconnected/panel.php';
        
                    }
                
                }elseif(isset($_GET['q']) && !empty($_GET['q'])){
                        
                    require 'public/page/fr/search.php';
                
                }else{
                
                    require 'public/page/fr/disconnected/panel.php';
                
                }
        
            }elseif($User->UserSession() == 2){
        
                session_destroy();
        
                header('Location: index.php');
        
            }   

        }else{

        if($User->UserSession() == 0)
        {
    
            //$IP->getConnection($db);
    
            require 'public/site/en/nav_bar.php';
    
            if(isset($_GET['page']) && !empty($_GET['page'])){
    
                if($_GET['page'] == "admin" && in_array($_SESSION['identifiant'], $group_admin)){

                    require 'actions/redirect/admin.php';
            
                }elseif($_GET['page'] == "tuto"){

                    require 'actions/redirect/tuto.php';
            
                }elseif($_GET['page'] == "procedure"){

                    require 'actions/redirect/procedure.php';
            
                }elseif($_GET['page'] == "contact"){
    
                    require 'public/page/en/contact.php';
    
                }elseif($_GET['page'] == "favoris"){
    
                    require 'public/page/en/connected/favoris.php';
    
                }elseif($_GET['page'] == "idea"){
    
                    require 'public/page/en/connected/idea.php';
    
                }elseif($_GET['page'] == "new"){
    
                    require 'public/page/en/connected/new.php';
    
                }elseif($_GET['page'] == "new_idea"){
    
                    require 'public/page/en/connected/new_idea.php';
    
                }elseif($_GET['page'] == "rgpd"){
    
                    require 'public/page/en/rgpd.php';
    
                }else{
    
                    require 'public/page/en/connected/panel.php';
    
                }
            
            }elseif(isset($_GET['q']) && !empty($_GET['q'])){
                    
                require 'public/page/en/search.php';
            
            }else{
            
                require 'public/page/en/connected/panel.php';
            
            }
            
    
        }elseif($User->UserSession() == 1){
    
            require 'public/site/en/nav_bar.php';
    
            if(isset($_GET['page']) && !empty($_GET['page'])){
    
                if($_GET['page'] == "tuto"){

                    require 'actions/redirect/tuto.php';
            
                }elseif($_GET['page'] == "procedure"){

                    require 'actions/redirect/procedure.php';
            
                }elseif($_GET['page'] == "contact"){
    
                    require 'public/page/en/contact.php';
    
                }elseif($_GET['page'] == "rgpd"){
    
                    require 'public/page/en/rgpd.php';
    
                }else{
    
                    require 'public/page/en/disconnected/panel.php';
    
                }
            
            }elseif(isset($_GET['q']) && !empty($_GET['q'])){
                    
                require 'public/page/en/search.php';
            
            }else{
            
                require 'public/page/en/disconnected/panel.php';
            
            }
    
        }elseif($User->UserSession() == 2){
    
            session_destroy();
    
            header('Location: index.php');
    
        }

        }
    
    }else{
    
        $Database -> addTables($db);
    
    }

}else{

    //require

}

require 'public/site/down_page.php';

?>