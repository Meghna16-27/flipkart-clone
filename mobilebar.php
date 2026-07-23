<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bottom Navigation</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, Helvetica, sans-serif;
}

/* Hidden by default */
.bottom-nav{
    display:none;
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    height:60px;
    background:#fff;
    border-top:1px solid #ddd;
    box-shadow:0 -2px 10px rgba(0,0,0,.08);
    z-index:9999;
}

.bottom-nav .nav-item{
    flex:1;
    display:flex;
    justify-content:center;
    align-items:center;
    text-decoration:none;
    color:#777;
    font-size:22px;
}

.bottom-nav .nav-item.active{
    color:#0d6efd;
}
@media (width:1400){
.bottom-nav{
  display:none;
}
}
  

/* Show only on tablets and mobiles */
@media (max-width:1024px){

    .bottom-nav{
        display:flex;
    }

    body{
        padding-bottom:60px;
    }
}

/* Small phones */
@media (max-width:480px){

    .bottom-nav{
        height:55px;
    }

    .bottom-nav .nav-item{
        font-size:20px;
    }
}

</style>
</head>
<body>



<nav class="bottom-nav">

    <a href="#" class="nav-item active">
        <i class="fa-solid fa-house"></i>
    </a>

    </a>

    <a href="signup.php" class="nav-item">
        <i class="fa-regular fa-circle-user"></i>
    </a>

</nav>

</body>
</html>