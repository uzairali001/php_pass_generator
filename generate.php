<?php

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405); //Method Not Allowed        
    }

    // $rest_json = file_get_contents("php://input");
    // $_POST = json_decode($rest_json, true);
    

    if(!empty($_POST) && !empty($_POST["plain_pass"]))
    {
        echo
        json_encode(
            array(
                "hash"=> password_hash($_POST["plain_pass"], PASSWORD_BCRYPT)
            )
        );

        
        return;
    }

    http_response_code(400); //Bad Request     

?>