<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php
if(isset($_SESSION['username'])){
?>
    <p>Welcome <?= $_SESSION['username'] ?></p>
<?php
}
?>
    <form action="../login/processes/logout.php" method="POST">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>