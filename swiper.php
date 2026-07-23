<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    

<style>
  /* Container styling */
  .banner-swiper-container {
    width: 100%;
    padding: 10px 0;
    position: relative;
  }


  .banner-swiper .swiper-slide img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 12px; 
    object-fit: cover;
  }


  .banner-swiper .swiper-button-next,
  .banner-swiper .swiper-button-prev {
    background-color: #ffffff;
    color: #333333;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  }

  .banner-swiper .swiper-button-next::after,
  .banner-swiper .swiper-button-prev::after {
    font-size: 16px;
    font-weight: bold;
  }


</style>

</head>
<body>
    <div class="banner-swiper-container">
  <div class="swiper banner-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <a href="#"><img src="assests/cards.png" alt="Banner 1" /></a>
      </div>
      <div class="swiper-slide">
        <a href="#"><img src="assests/cards.png" alt="Banner 2" /></a>
      </div>
      <div class="swiper-slide">
        <a href="#"><img src="assests/cards.png" alt="Banner 3" /></a>
      </div>
      <div class="swiper-slide">
        <a href="#"><img src="assests/cards.png" alt="Banner 4" /></a>
      </div>
    </div>

    <!-- Navigation Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <!-- Pagination Dots -->
    <div class="swiper-pagination"></div>
  </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const bannerSwiper = new Swiper('.banner-swiper', {
    // Allows dragging with mouse
    grabCursor: true,
    
    // Gap between banners (in px)
    spaceBetween: 16,
    
    // Loop back to start
    loop: true,

    // Autoplay configuration
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },

    // Dots pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    // Next/Prev buttons
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // Responsive breakpoints (Matches desktop vs mobile display)
    breakpoints: {
      // Mobile screens: show 1 full banner
      0: {
        slidesPerView: 1.1,
        spaceBetween: 10,
      },
      // Tablet screens: show 2 banners
      640: {
        slidesPerView: 2.1,
        spaceBetween: 12,
      },
      // Desktop screens: show ~2.5 banners like Flipkart
      1024: {
        slidesPerView: 2.5,
        spaceBetween: 16,
      },
    },
  });
</script>
</body>
</html>


