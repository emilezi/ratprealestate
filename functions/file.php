<?php
/**
    * File management class.
    *
    * @author Emile Z.
    */
class File{

    /**
        * Checks if a location is writable
        *
        * @return boolean if a location is writable
        *
        */
    public function CheckWriteability(){
        if(file_put_contents("test.txt",'test') == TRUE){

            unlink('test.txt');

            return 0;

        }else{

            return 1;

        }
    }

    /**
        * Uploads reset method
        *
        */
    public function UploadsReset(){

        $folder1 = "uploads/procedures/";
        $folder2 = "uploads/temps/";

        if(is_dir($folder1)){

            if($open = opendir($folder1))
            {

                while(($file = readdir($open)) !=false)
                {

                    if($file == '.' || $file == '..') continue;

                    unlink($folder1.$file);

                }

            closedir($open);

            }

        }

        if(is_dir($folder2)){

            if($open = opendir($folder2))
            {

                while(($file = readdir($open)) !=false)
                {

                    if($file == '.' || $file == '..') continue;

                    unlink($folder2.$file);

                }

            closedir($open);

            }

        }

    }

    /**
        * Check if the selected document have a valid import format
        *
        * @param array file information
        *
        * @return int if file can be imported else return error
        *
        */
    public function CheckPDF($files){

        if(!empty($files['pdf']['name']))
            {

            if(isset($files["pdf"]) && $files["pdf"]["error"] == 0){
                $extensions_list = array('.pdf');
                $extension = strrchr($files['pdf']['name'], '.');

                    if($files['pdf']['size'] < 35000000){

                        if(in_array($extension, $extensions_list)){
        
                            return 0;
                
                        }else{
                            
                            return 1;
        
                        }
        
                    }else{
        
                        return 2;
        
                    }

                }else{

                    return 3;

                }

            }else{

                return 4;

            }
    
    }

    /**
        * Import document method
        *
        * @param array file information
        *
        * @param string id file
        *
        */
    public function ImportPDF($files,$id){

        move_uploaded_file($files["pdf"]["tmp_name"], "uploads/procedures/" . $id . ".pdf");

    }

    /**
        * Check if the selected picture have a valid import format
        *
        * @param array file information
        *
        * @return int if file can be imported else return error
        *
        */
    public function CheckPicture($files){

        if(!empty($files['picture']['name']))
            {

            if(isset($files["picture"]) && $files["picture"]["error"] == 0){
                $extensions_list = array('.png', '.gif', '.jpg', '.jpeg');
                $extension = strrchr($files['picture']['name'], '.');

                    if($files['picture']['size'] < 3500000){

                        if(in_array($extension, $extensions_list)){
        
                            return 0;
                
                        }else{
                            
                            return 1;
        
                        }
        
                    }else{
        
                        return 2;
        
                    }

                }else{

                    return 3;

                }

            }else{

                return 4;

            }
    
    }

    /**
        * Import picture method
        *
        * @param array file information
        *
        */
    public function ImportPicture($files){

        $id = md5(microtime(TRUE)*100000);

        $extension = strrchr($files['picture']['name'], '.');

        move_uploaded_file($files["picture"]["tmp_name"], "uploads/temps/" . $id.$extension);

    }

    /**
        * Check if the selected video have a valid import format
        *
        * @param array file information
        *
        * @return int if file can be imported else return error
        *
        */
    public function CheckVideo($files){

        if(!empty($files['video']['name']))
            {

            if(isset($files["video"]) && $files["video"]["error"] == 0){
                $extensions_list = array('.mp4');
                $extension = strrchr($files['video']['name'], '.');

                    if($files['video']['size'] < 35000000){

                        if(in_array($extension, $extensions_list)){
        
                            return 0;
                
                        }else{
                            
                            return 1;
        
                        }
        
                    }else{
        
                        return 2;
        
                    }

                }else{

                    return 3;

                }

            }else{

                return 4;

            }
    
    }

    /**
        * Import video method
        *
        * @param array file information
        *
        */
    public function ImportVideo($files){

        $id = md5(microtime(TRUE)*100000);

        $extension = strrchr($files['video']['name'], '.');

        move_uploaded_file($files["video"]["tmp_name"], "uploads/temps/" . $id.$extension);

    }

    /**
        * Move the selected files to the tutorials directory
        *
        * @param array post information
        *
        * @param string id directory
        *
        */
    public function MoveUpload($post,$id){

        $folder = "uploads/temps/";

        if(is_dir($folder)){

            if($open = opendir($folder))
            {

            mkdir("uploads/tutoriels/".$id);

            
            while(($file = readdir($open)) !=false)
            {

                if($file == '.' || $file == '..') continue;

                copy($folder.$file,"uploads/tutoriels/".$id."/".$file);

                unlink($folder.$file);

            }

            closedir($open);

            }

        }

    }

    /**
        * Delete temps method
        *
        */
    public function deleteTemps(){

        $folder = "uploads/temps/";

        if(is_dir($folder)){

            if($open = opendir($folder))
            {

                while(($file = readdir($open)) !=false)
                {

                    if($file == '.' || $file == '..') continue;

                    unlink($folder.$file);

                }

            closedir($open);

            }

        }

    }

    /**
        * Delete tutoriel method
        *
        * @param string id tutoriel directory
        *
        */
    public function deleteTutoriel($id){

        if($open = opendir("uploads/tutoriels/".$id."/"))
        {
            while(($file = readdir($open)) !=false)
            {
                if($file == '.' || $file == '..') continue;
                unlink("uploads/tutoriels/".$id."/".$file);
            }
            closedir($open);
        }
        rmdir("uploads/tutoriels/".$id."/");

    }

    /**
        * Delete procedure method
        *
        * @param string id procedure
        *
        */
    public function deleteProcedure($id){

        unlink("uploads/procedures/".$id.".pdf");

    }

}

$File = new File();