<?php
    session_start();
    include "functions.php";
    include "db-functions.php";
    include "db_security.php";

    $action = filter_input(INPUT_GET, "action", FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "/login|register|logout/"
        ]
    ]);

    if($action){

        switch($action){
            case "login":
                break;
            case "register":
                if(isset($_POST['submit'])){
                    $username = filter_input(INPUT_POST, "username", FILTER_VALIDATE_REGEXP, [
                        "options" => [
                            "regexp" => "/^[A-Za-z0-9]{6,50}$/"
                        ]
                    ]);

                    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                    $pass1 = filter_input(INPUT_POST, "pass1", FILTER_VALIDATE_REGEXP, [
                        "options" => [
                            "regexp" => "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/"
                        ]
                    ]);
                    $pass2 = filter_input(INPUT_POST, "pass2", FILTER_DEFAULT);

                    if($username && $email && $pass1){
                        if($pass1 === $pass2){
                            if(!findByUsernameOrEmail($username, $email)){
                                $hash = password_hash($pass1, PASSWORD_ARGON2ID);
                                
                            }
                        }else{
                            echo "pas good";
                        }
                    }
                }
                break;

            case "logout":
                break;        
        }
    }
?>