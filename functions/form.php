<?php

class Form{

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

    public function PostEdit($post){

        if(!empty($post['post_comment'])){
                return 0;
        }else{
            return 1;
        }
        
    }

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