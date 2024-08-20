<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login/styles/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <section>
            <form class="frame57" action="process.php" method="POST">
                <h2>Get Started Now</h2>
                <div class="name-container">
                    <label for="">Name</label>
                    <input type="text" placeholder="Enter your name..">
                </div>
                <div class="email-container">
                    <label for="">Email Address</label>
                    <input type="text" placeholder="Enter your email">
                </div>
                <div class="password-container">
                    <label for="">Password</label>
                    <input type="text" placeholder="Enter password">
                </div>
                <div class="remember">
                    <input type="checkbox"><p>I Agree to the <span>terms & policy</span></p>
                </div>
                <div class="submit-container">
                    <input type="submit" value="Signup">
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
                    <p>Already have an account? <a href="login.php">Sign In</a></p>
                </div>
            </form>
        </section>
        <section>
            <img src="../login/assets/image.png" alt="">
        </section>
    </div>
</body>
</html>