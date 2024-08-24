<?php

require("new-connection.php");
session_start();
$_SESSION['data'] = array();

processLogin($_POST['email'],$_POST['password']);

function processLogin($email, $password){
    $email === '' ?  $total++ :  $_SESSION['data']['email'] = $email;

    if(!empty($email) && !empty($password)){
        //to check if the email is available in the database
        $query = "SELECT * FROM users WHERE email = '$email'";
        $record = fetch_record($query);

        if(!isset($record)){
            $_SESSION['errormessage'] = "Incorrect email address.";
            header("location: ../login.php");
            exit();
        }else{
            $encrypted_password = md5($password.''. $record['salt']);

            if($encrypted_password !== $record['password']){
                $_SESSION['errormessage'] = "Incorrect password.";
                header("location: ../login.php");
                exit();
            }else{
                $_SESSION['success'] = "Login Successfull!";
                $_SESSION['username'] = $record['user_name'];
                $_SESSION['userId'] =  $record['id'];
                header("location: ../dashboard.php");
                exit();
            }
        }
    }else{
        $_SESSION['errormessage'] = "Please complete the fields below..";
        header("location: ../login.php");
        exit();
    }
}

?>