<?php
/**
    * Form management class.
    *
    * @author Emile Z.
    */
class Form{

    /**
        * Verification of fields entered for the of a new app
        *
        * @param array form post app information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function AppCheck($post){

        if(
            !empty($post['name'])
            &&
            !empty($post['description'])
            &&
            !empty($post['link'])
            )
            {
                if(
                preg_match("#^[^<>]+$#i", $post['name'])
                &&
                preg_match("#^[^<>]+$#i", $post['description'])
                &&
                preg_match("#^[^<>]+$#i", $post['link'])
                )
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
    
            }

    }

    /**
        * Verification of fields entered for the of a new post
        *
        * @param array form new post information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function PostCheck($post){

        if(
            !empty($post['title'])
            &&
            !empty($post['elements'])
            )
            {
                if(preg_match("#^[^<>]+$#i", $post['title']))
                {
                    return 0;
                }else{
                    return 1;
                }
        }else{
            return 2;

        }
        
    }

    /**
        * Verification of fields entered for the of a post edit
        *
        * @param array form post edit information
        *
        * @return boolean if the input field is not empty
        *
        */
    public function PostEdit($post){

        if(!empty($post['post_comment'])){
                return 0;
        }else{
            return 1;
        }
        
    }

    /**
        * Verification of fields entered for the of a new tutoriel
        *
        * @param array form new tutoriel information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function TutoCheck($post){

        if(
        !empty($post['title'])
        &&
        !empty($post['elements'])
        )
        {
            if(preg_match("#^[^<>]+$#i", $post['title']))
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;

        }
        
    }

    /**
        * Verification of fields entered for the of a new idea
        *
        * @param array form idea information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function IdeaCheck($post){

        if(
            !empty($post['title'])
            &&
            !empty($post['elements'])
            )
            {
                if(preg_match("#^[^<>]+$#i", $post['title']))
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
    
            }
        
    }

    /**
        * Verification of fields entered for the authentication
        *
        * @param array form authentication information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function LoginCheck($post){

        if(!empty($post['identifiant']) && !empty($post['password']))
        {
            if(preg_match("#^[^<>]+$#i", $post['identifiant']))
            {

                return 0;

            }else{

                return 1;

            }

        }else{

            return 2;

        }


    }

}

$Form = new Form();