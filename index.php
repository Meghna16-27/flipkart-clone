<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>
<body>
     
    <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$status = $_GET['status'] ?? '';
$action = $_GET['action'] ?? (($status === 'new_user') ? 'signup' : 'login');
?>
   <div class="container"> 
                <header class="header">
                    <div class="whole">
                        <div class="btn">
                            <img src="assests/images.png" alt="Flipkart Logo">
                            <span >Flipkart</span>     
                        </div>
                        <div class="btn grey">
                                <img src="assests/images.png" alt="Flipkart Logo">
                                <span >Travel</span>     
                        </div> 
                    </div>
                        <div class="location">
                            <i class="fa fa-map-marker" aria-hidden="true" style="font-size:24px"></i>
                            <span>Location not set</span>
                            <a>Select Delivery Location</a>
                            <i class="fa fa-angle-right" style="color:blue"></i>
                        </div>         

                
             <!-- searchbar -->
                <div class="search">
                    <div class="search-box">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Search for Products, Brands and More">
                    </div>
                    <div class="item">

                        <?php if (isset($_SESSION['user_id'])): ?>
                           <div class="user-dropdown">
                            <a href="#" class="login" style="text-decoration: none; color: inherit;">
                                <i class="fa fa-user-circle"></i>
                                <span>User</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            
                            <!-- Dropdown Menu -->
                            <div class="dropdown-content">
                                <a href="profile.php"><i class="fa fa-user-circle"></i> My Profile</a>
                                <a href="orders.php"><i class="fa fa-shopping-bag"></i> Orders</a>
                                <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                 <a href="profile.php"><i class="fa fa-user-circle"></i> My Profile</a>
                                <a href="orders.php"><i class="fa fa-shopping-bag"></i> Orders</a>
                                 
                            </div>
                        </div>
                          

                        <?php else: ?>
                          <div class="user-dropdown">   
                            <a href="signup.php?action=login" class="login" style="text-decoration: none; color: inherit;">
                                <i class="fa fa-user-circle"></i>
                                <span>Login</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-content">
                                <a href="signup.php?action=signup"><i class="fa fa-sign-out"></i> signup</a>
                                <a href="#"><i class="fa fa-sign-out"></i> 24*7 Delivery</a>
                                <a href="#"><i class="fa fa-sign-out"></i> Gift Cards</a>
                                    
                            </div>
                        </div>   
                        <?php endif; ?>
                        <div class="login">
                            <span>More</span>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="login">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Cart</span>
                        </div>

                    </div>

                </div>

                <div class="section">
                    <!-- icon-section -->
                    <div class="outline">
                        <div class="category" id="hi">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/all.svg">
                            <p>For You</p>
                        </div>

                        <div class="category" id="smartphones">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/mobiles.svg">
                            <p>Mobiles</p>
                        </div>

                        <div class="category" id="womens-dresses">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/fashion.svg">
                            <p>Fashion</p>
                        </div>

                        <div class="category" id="beauty">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/beauty.svg">
                            <p>Beauty</p>
                        </div>

                        <div class="category" id="home-decoration">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/home-final.svg">
                            <p>Home</p>
                        </div>

                        <div class="category" id="laptops">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/electronics.svg">
                            <p>Electronics</p>
                        </div>
                        <div class="category" id="mobile-accessories">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/tv.svg">
                            <p>Applications</p>
                        </div>
                        <div class="category">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/toy.svg">
                            <p>Toys,baby</p>
                        </div>
                        <div class="category" id="groceries">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/food.svg">
                            <p>Food &Health</p>
                        </div>
                        <div class="category">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/auto-acc.svg">
                            <p>Auto access</p>
                        </div>
                        <div class="category">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/sport.svg">
                            <p>sports&Fit</p>
                        </div>
                        <div class="category"id="furniture">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/furniture.svg">
                            <p>furniture</p>
                        </div>
                        <div class="category">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/books.svg">
                            <p>Books</p>
                        </div>
                        <div class="category">
                            <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/auto-new.svg">
                            <p>2 wheeler</p>
                        </div>
                    </div>
                </div>    
            </header> 


                <div class="page-content">
                    <!-- couponsection -->
                    <div class="coupon-wrapper">
                        <img src="assests/coupons.png" alt="coupon">
                    </div>
                    <div class="card">
                      <?php 
                      include "swiper.php";
                      ?>
                    </div>
                </div>
            
            <?php
            include "category.php";
            ?>
    </div>
   <?php
        include "footer.php";
    ?>
    <?php
    include "mobilebar.php";
    ?>
    
    <script src="index.js"> </script>
</body>
</html>