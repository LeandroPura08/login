<?php

session_start();
require("new-connection.php");

if(isset($_POST) && !empty($_POST['reply'])){
    $query = "INSERT INTO replies(review_id,user_id,content,created_at,updated_at) VALUES('{$_POST['reviewId']}','{$_POST['userId']}','{$_POST['reply']}',NOW(),NOW())";
    if(run_mysql_query($query)){
        $_SESSION['success'] = "Your reply has been posted";
        header("location: ../dashboard.php");
        exit();
    }else{
        $_SESSION['failed'] =  "Reply not posted, Database Error!";
        header("location: ../dashboard.php");
        exit();
    }
}
?>