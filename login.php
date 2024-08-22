<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: ../login/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login/styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Log-in</title>
</head>
<body>
<?php
    if(isset($_SESSION['errormessage'])){
?>
    <p class="errormessage"><?= $_SESSION['errormessage'] ?></p>
<?php
    }
?>
    <div class="container">
        <section>
            <form class="frame57" action="../login/processes/login_process.php" method="POST">
                <h2>Welcome back!</h2>
                <p class="entercredentials">Enter your Credentials to access your account</p>
                <div class="email-container">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" value="<?= isset($_SESSION['data']['email']) ?  $_SESSION['data']['email'] : null ?>">
                </div>
                <div class="password-container">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter password">
                </div>
                <div class="remember">
                    <input type="checkbox"><p>Remember for 30 days</p>
                </div>
                <div class="submit-container">
                    <input type="submit" value="Login">
                </div>
                <div class="or">
                    <p>Or</p>
                </div>

                <div class="online-login">
                    <div class="google option">
                        <div class="option-container">
                            <img src="../login/assets/icons8-google1.png" alt="google logo"> 
                            <p>Sign in with Google</p>
                        </div>
                    </div>
                    <div class="apple option">
                        <div class="option-container">
                            <img src="../login/assets/icons8-apple-logo1.png" alt="">
                            <p>Sign in with Apple</p>
                        </div>
                    </div>
                </div>

                <div class="signup">
                    <p>Dont have an account? <a href="register.php">Sign Up</a></p>
                </div>
            </form>
        </section>
        <section>
            <img src="../login/assets/image.png" alt="">
        </section>
    </div>
<?php
session_destroy();
?>
</body>
</html>