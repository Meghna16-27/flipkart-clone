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
        </div>
<?php 
    } elseif ($_GET['status'] == 'loggedin') { 
?>
        <div style="position: absolute; top: 20px; background: #4caf50; color: white; padding: 10px 20px; border-radius: 4px;">
            Logged in successfully!
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
           
            <i class="fa fa-shopping-bag" style="font-size: 80px; opacity: 0.2; align-self: center;"></i>
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

            <a href="index.php" class="footer-link">New to Flipkart? Create an account</a>
        </form>
    </div>


</body>
</html>