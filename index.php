<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
   <div class="container"> 
        <div class="top-section">
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
                            <i class="fa fa-map-marker" style="font-size:24px"></i>
                            <span>Location not set</span>
                            <a>Select Delivery Location</a>
                            <i class="fa fa-angle-right" style="color:blue"></i>
                        </div>  

                </header>  
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
                                <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                 <a href="profile.php"><i class="fa fa-user-circle"></i> My Profile</a>
                                <a href="orders.php"><i class="fa fa-shopping-bag"></i> Orders</a>
                                <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                          

                        <?php else: ?>
                            <a href="login.php" class="login" style="text-decoration: none; color: inherit;">
                               <i class="fa fa-user-circle"></i>
                                <span>Login</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                        <?php endif; ?>
                        <div class="login">
                            <span>More</span>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="login">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Cart</span>
                            <i class="fa fa-angle-down"></i>
                        </div>

                    </div>

                </div>

            <div class="section">
                <!-- icon-section -->
                <div class="outline">
                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/all.svg">
                        <p>For You</p>
                    </div>

                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/mobiles.svg">
                        <p>Mobiles</p>
                    </div>

                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/fashion.svg">
                        <p>Fashion</p>
                    </div>

                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/beauty.svg">
                        <p>Beauty</p>
                    </div>

                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/home-final.svg">
                        <p>Home</p>
                    </div>

                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/electronics.svg">
                        <p>Electronics</p>
                    </div>
                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/tv.svg">
                        <p>Applications</p>
                    </div>
                    <div class="category">
                        <img src="https://static-assets-web.flixcart.com/apex-static/images/svgs/L1Nav/toy.svg">
                        <p>Toys,baby</p>
                    </div>
                    <div class="category">
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
                    <div class="category">
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

                <div class="content-scroll">
                    <!-- couponsection -->
                    <div class="coupon-wrapper">
                        <img src="assests/coupons.png" alt="coupon">
                    </div>
                    <div class="card">
                        <img src="assests/cards.png" alt="card1">
                        <img src="assests/cards.png" alt="card2">
                    </div>
                </div>
            </div>
          </div>  
    </div>
    <script src="index.js"> </script>
</body>
</html>