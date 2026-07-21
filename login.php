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

    <footer class="site-footer">
  <!-- Top Section: Links & Addresses -->
  <div class="footer-top">
    <div class="footer-container">
      
      <!-- Column 1: About -->
      <div class="footer-col">
        <h3>ABOUT</h3>
        <ul>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Flipkart Stories</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Corporate Information</a></li>
        </ul>
      </div>

      <!-- Column 2: Group Companies -->
      <div class="footer-col">
        <h3>GROUP COMPANIES</h3>
        <ul>
          <li><a href="#">Myntra</a></li>
          <li><a href="#">Cleartrip</a></li>
          <li><a href="#">Shopsy</a></li>
        </ul>
      </div>

      <!-- Column 3: Help -->
      <div class="footer-col">
        <h3>HELP</h3>
        <ul>
          <li><a href="#">Payments</a></li>
          <li><a href="#">Shipping</a></li>
          <li><a href="#">Cancellation & Returns</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
      </div>

      <!-- Column 4: Consumer Policy -->
      <div class="footer-col">
        <h3>CONSUMER POLICY</h3>
        <ul>
          <li><a href="#">Cancellation & Returns</a></li>
          <li><a href="#">Terms Of Use</a></li>
          <li><a href="#">Security</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Sitemap</a></li>
          <li><a href="#">Grievance Redressal</a></li>
          <li><a href="#">EPR Compliance</a></li>
          <li><a href="#">FSSAI Food Safety Connect App</a></li>
        </ul>
      </div>

      <!-- Divider between links and address -->
      <div class="footer-divider"></div>

      <!-- Column 5: Mail Us -->
      <div class="footer-col address-col">
        <h3>Mail Us:</h3>
        <p>Flipkart Internet Private Limited,<br>
           Buildings Alyssa, Begonia &<br>
           Clove Embassy Tech Village,<br>
           Outer Ring Road, Devarabeesanahalli Village,<br>
           Bengaluru, 560103,<br>
           Karnataka, India</p>

        <h3 class="social-heading">Social</h3>
        <div class="social-icons">
          <a href="#" aria-label="Facebook">
            <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
          </a>
          <a href="#" aria-label="X (Twitter)">
            <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <a href="#" aria-label="YouTube">
            <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
          </a>
          <a href="#" aria-label="Instagram">
            <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
        </div>
      </div>

      <!-- Column 6: Registered Address -->
      <div class="footer-col address-col">
        <h3>Registered Office Address:</h3>
        <p>Flipkart Internet Private Limited,<br>
           Buildings Alyssa, Begonia &<br>
           Clove Embassy Tech Village,<br>
           Outer Ring Road, Devarabeesanahalli Village,<br>
           Bengaluru, 560103,<br>
           Karnataka, India<br>
           CIN : U51109KA2012PTC066107<br>
           Telephone: <a href="tel:04445614700" class="phone-link">044-45614700</a> / <a href="tel:04467415800" class="phone-link">044-67415800</a>
        </p>
      </div>

    </div>
  </div>

  <!-- Bottom Bar: Sub-menu, Copyright & Payment Methods -->
  <div class="footer-bottom">
    <div class="footer-bottom-container">
      <div class="footer-action-links">
        <a href="#"><span class="icon">💼</span> Become a Seller</a>
        <a href="#"><span class="icon">⭐</span> Advertise</a>
        <a href="#"><span class="icon">🎁</span> Gift Cards</a>
        <a href="#"><span class="icon">❓</span> Help Center</a>
      </div>

      <div class="copyright">
        © 2007-2026 Flipkart.com
      </div>

      <div class="payment-methods">
        <span class="badge">VISA</span>
        <span class="badge">MasterCard</span>
        <span class="badge">Amex</span>
        <span class="badge">Discover</span>
        <span class="badge">RuPay</span>
        <span class="badge">NetBanking</span>
        <span class="badge">COD</span>
        <span class="badge">EMI</span>
      </div>
    </div>
  </div>
</footer>
</body>
</html>