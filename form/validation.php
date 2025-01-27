<?php 
    function validation($request){
        $errors = [];

        if(empty($request['your_name']) || 20 < mb_strlen($request['your_name'])){
            $errors[] = 'Name is required. 20 character down'; 
        }

        if(empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email is required. Pls input correct email'; 
        }

        if(empty($request['url'])|| !filter_var($request['url'], FILTER_VALIDATE_URL)){
            $errors[] = 'URL is required. pls input correct url'; 
        }

        if(empty($request['caution'])){
            $errors[] = 'Pls checkbox';
        }

        if(!isset($request['gender'])){
            $errors[] = 'Sex is required';
        }

        if(empty($request['age'])){
            $errors[] = 'Pls chose age';
        }

        return $errors;
    }
?>