<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flipkart Clone - Trending Gadgets</title>
  <style>
 
    .category-section {
      background-color: #eef0ff; 
      border-radius: 16px;
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
      margin-bottom:20px;
    }

    /* Header Bar */
    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }

    .section-title {
      font-size: 22px;
      font-weight: 700;
      color: #000;
    }



    /* Products Inner Container */
    .product-grid {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 16px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
    }

    /* Individual Product Card */
    .product-card {
      display: flex;
      flex-direction: column;
      cursor: pointer;
      text-decoration: none;
      color: inherit;
      
    }

  
    .image-container {
      background-color: #f7f7f7;
      border-radius: 8px;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      padding: 12px;
    }

    .image-container img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain; /* Prevents stretching and fits standard e-commerce thumbnails */
      transition: transform 0.2s ease-in-out;
    }

    .product-card:hover .image-container img {
      transform: scale(1.05);
    }

    .product-details {
      margin-top: 10px;
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .product-title {
      font-size: 14px;
      color: #212121;
      font-weight: 400;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .product-offer {
      font-size: 14px;
      font-weight: 700;
      color: #000;
    }
  </style>
</head>
<body>

  <section class="category-section">
    <div class="section-header">
      <h2 class="section-title">Trending Gadgets & Appliances</h2>
    </div>

    <!-- Product Container -->
    <div id="product-grid" class="product-grid">
      <p>Loading products...</p>
    </div>
  </section>

  <script src="script.js"></script>
</body>
</html>