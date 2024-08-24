<?php
require("new-connection.php");
session_start();

    if(isset($_POST) && !empty($_POST['review'])){
        $query = "INSERT INTO reviews(user_id,content,created_at,updated_at) VALUES('{$_POST['userId']}','{$_POST['review']}',NOW(),NOW())";
        if(run_mysql_query($query)){
            $_SESSION['success'] = "Review Posted";
            header("location: ../dashboard.php");
            exit();
        }else{
            $_SESSION['failed'] =  "Review not posted, Database Error!";
            header("location: ../dashboard.php");
            exit();
        }
    }else{
        $_SESSION['failed'] =  "Review field is empty!";
        header("location: ../dashboard.php");
        exit();
    }
?>