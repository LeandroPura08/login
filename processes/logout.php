<?php
session_start();
session_destroy();
$_SESSION['success'] = "Successfully Logged-out.";
header("location: ../login.php");
exit();
?>