<?php
    // require("login\processes\new-connection.php");
    require("new-connection.php");
    session_start();
    $_SESSION['data'] = array();
    processRegister($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirm-password']);

    function processRegister($username,$email,$password,$confirmpassword){
        $total = 0;
        $username === '' ?  $total++ :  $_SESSION['data']['username'] = $username;
        $email === '' ?  $total++ :  $_SESSION['data']['email'] = $email;
        $password === '' ?  $total++ :  $_SESSION['data']['password'] = $password;
        $confirmpassword === '' ?  $total++ :  null;
        
        if($total >= 1){
            $_SESSION['errormessage'] = "Please complete the fields below";
            header("location: ../register.php");
            exit();
        }else
        if(strlen($username) <= 2){
            $_SESSION['errormessage'] = "Username should be more than 2 characters.";
            header("location: ../register.php");
            exit();
        }else{
            $query = "SELECT * FROM users WHERE email = '$email'";
            $record = fetch_record($query);

            if(isset($record)){
                $_SESSION['errormessage'] = "Email Address is already taken!";
                header("location: ../register.php");
                exit();
            }else{
                $salt = bin2hex(openssl_random_pseudo_bytes(22));
                $encrypted_password = md5($password.''. $salt);

                if($password !== $confirmpassword){
                    $_SESSION['errormessage'] = "Password not matching!";
                    header("location: ../register.php");
                    exit();
                }else
                if(strlen($password) < 8){
                    $_SESSION['errormessage'] = "Password needs to be atleast 8 characters!";
                    header("location: ../register.php");
                    exit();
                }
                else{
                    $query = "INSERT INTO users(user_name,email,password,salt,created_at,updated_at)
                            VALUES('$username','$email','$encrypted_password','$salt', NOW(),NOW())";
                    if(run_mysql_query($query)){
                        $_SESSION['success'] = "Login Successfull!";
                        $_SESSION['username'] = $username;
                        header("location: ../dashboard.php");
                        exit();
                    }
                }
            }
        }

    }

?>