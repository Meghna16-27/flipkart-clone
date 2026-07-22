<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$saved_email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart - Login / Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="loginpage.css">
</head>
<body>

    <header class="site-header">
        <div class="header-brand-search">
          <a href="#" class="arrow" onclick="window.history.back(); return false;" aria-label="Go Back">
      <i class="fa fa-arrow-left"></i>
    </a>
            <div class="brand">
                <span class="brand-name">Flipkart</span>
                <span class="brand-tagline">Explore Plus</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search for products, brands and more">
                <button type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="header-actions">
            <a href="login.php" class="header-button">Login</a>
            <a href="#" class="header-link">Become a Seller</a>
            <a href="#" class="header-link">More <i class="fa fa-caret-down"></i></a>
            <a href="#" class="cart-link"><i class="fa fa-shopping-cart"></i> Cart</a>
        </div>
    </header>
    <nav class="header-nav">
        <a href="#">Electronics</a>
        <a href="#">TVs & Appliances</a>
        <a href="#">Men</a>
        <a href="#">Women</a>
        <a href="#">Baby & Kids</a>
        <a href="#">Home & Furniture</a>
        <a href="#">Sports, Books & More</a>
        <a href="#">Flights</a>
        <a href="#">Offer Zone</a>
    </nav>

    <!-- STATUS ALERT BANNERS -->
    <div id="status-banner" style="display: none; position: absolute; top: 20px; padding: 10px 20px; border-radius: 4px; color: white;"></div>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'invalid_credentials'): ?>
        <div style="position: absolute; top: 20px; background: #f44336; color: white; padding: 10px 20px; border-radius: 4px;">
            Wrong email or password. Please try again.
        </div>
    <?php endif; ?>

  

    <main class="page-content">
        <div class="login-container">
        
            <!-- LEFT INFO PANEL -->
            <div class="info-panel">
            <div>
                <h2 id="panel-heading">Login</h2>
                <p id="panel-subtext">Get access to your Orders, Wishlist and Recommendations</p>
            </div>
           
            <img src="assests/background.png" style="font-size: 80px; align-self: center;">
        </div>

        <!-- RIGHT FORM PANEL -->

        <form class="form-panel" action="database.php" method="POST">
            <div>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Enter Email" value="<?php echo $saved_email; ?>" required>
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                <p class="terms-text">
                    By continuing, you agree to Flipkart's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                </p>
                
                <!-- Action Type field toggled via JS -->
                <input type="hidden" id="action_type" name="action_type" value="login">

                <!-- SUBMIT BUTTON -->
                <button type="submit" name="submit" id="submit-btn" class="submit-btn">Login</button>
            </div>

            <!-- FOOTER LINK -->
            <div class="footer">
                <a href="#" id="toggle-auth-btn" class="footer-link">New to Flipkart? Create an account</a>
            </div>
        </form>
    </div>
    </main>



    <!-- footer -->


</body>
</html>