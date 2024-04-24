<?php

if($Setting->getLanguage() == 'fr'){

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "new_app"){
                
            require 'public/page/fr/admin/new_app.php';
                
        }elseif($_GET['action'] == "new_post"){
                
            require 'public/page/fr/admin/new_post.php';
                
        }elseif($_GET['action'] == "new_procedure"){
                
            require 'public/page/fr/admin/new_procedure.php';
                
        }elseif($_GET['action'] == "new_tuto"){
                
            require 'public/page/fr/admin/new_tuto.php';
                
        }elseif($_GET['action'] == "new_upload"){
                
            require 'public/page/fr/admin/new_upload.php';
                
        }elseif($_GET['action'] == "apps"){
                
            require 'public/page/fr/admin/apps.php';
                    
        }elseif($_GET['action'] == "idea"){
                
            require 'public/page/fr/admin/idea.php';
                    
        }elseif($_GET['action'] == "new"){
                
            require 'public/page/fr/admin/new.php';
                    
        }else{
    
            require 'public/page/fr/admin/panel.php';
    
        }
    
    }else{
    
        require 'public/page/fr/admin/panel.php';
    
    }           

}else{

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "new_app"){
                
            require 'public/page/en/admin/new_app.php';
                
        }elseif($_GET['action'] == "new_post"){
                
            require 'public/page/en/admin/new_post.php';
                
        }elseif($_GET['action'] == "new_procedure"){
                
            require 'public/page/en/admin/new_procedure.php';
                
        }elseif($_GET['action'] == "new_tuto"){
                
            require 'public/page/en/admin/new_tuto.php';
                
        }elseif($_GET['action'] == "new_upload"){
                
            require 'public/page/en/admin/new_upload.php';
                
        }elseif($_GET['action'] == "apps"){
                
            require 'public/page/en/admin/apps.php';
                    
        }elseif($_GET['action'] == "idea"){
                
            require 'public/page/en/admin/idea.php';
                    
        }elseif($_GET['action'] == "new"){
                
            require 'public/page/en/admin/new.php';
                    
        }else{
    
            require 'public/page/en/admin/panel.php';
    
        }
    
    }else{
    
        require 'public/page/en/admin/panel.php';
    
    }

}