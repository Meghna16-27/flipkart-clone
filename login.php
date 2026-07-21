
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="loginpage.css">

</head>
<body>
    <?php 
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') { 
    ?>
            <div style="position: absolute; top: 20px; background: #4caf50; color: white; padding: 10px 20px; border-radius: 4px;">
                Data saved successfully!
                <a href="index.php" style="color: white; margin-left: 15px;  font-weight: bold;">Return to Home</a>
            </div>
    <?php 
        } elseif ($_GET['status'] == 'loggedin') { 
    ?>
            <div style="position: absolute; top: 20px; background: #4caf50; color: white; padding: 10px 20px; border-radius: 4px;">
                Logged in successfully!
                <a href="index.php" style="color: white; margin-left: 15px;  font-weight: bold;">Return to Home</a>
            </div>
    <?php 
    } elseif ($_GET['status'] == 'invalid_credentials') { 
    ?>
            <div style="position: absolute; top: 20px; background: #f44336; color: white; padding: 10px 20px; border-radius: 4px;">
                Wrong email or password (invalid credentials). Try again.
            </div>
    <?php 
        } 
    } 
?>
    <div class="login-container">
    
        <div class="info-panel">
            <div>
                <h2>Login</h2>
                <p>Get access to your Orders, Wishlist and Recommendations</p>
            </div>
           
            <img src="assests/background.png" style="font-size: 80px; opacity: 0.; align-self: center;">
        </div>


        <form class="form-panel" action="database.php" method="POST">
            <div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                
                <div class="input-group">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>

                <p class="terms-text">
                    By continuing, you agree to Flipkart's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                </p>
                
                <button type="submit" name="submit" class="submit-btn">Login</button>
            </div>

            <div class="footer">
            <a href="index.php" class="footer-link">New to Flipkart? Create an account</a>
        </div>

          
        </form>
    </div>


</body>
</html>