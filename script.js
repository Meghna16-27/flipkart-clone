// Function to fetch products from DummyJSON API
async function loadHomePageProducts() {
  const container = document.getElementById("product-grid");

  try {

    const response = await fetch("https://dummyjson.com/products/category/mens-watches?limit=5");
    
    if (!response.ok) {
      throw new Error("Failed to fetch products from API");
    }

    const data = await response.json();
    const products = data.products;

    container.innerHTML = "";

    // Loop through products and build the Flipkart UI cards
    products.forEach(product => {
      const card = document.createElement("div");
      card.classList.add("product-card");

      // Calculate or format offer text
      const offerText = product.discountPercentage 
        ? `Min. ${Math.round(product.discountPercentage)}% Off` 
        : "Special offer";

        //innerHTML set the html inside our DOM . it is a Dom property
      card.innerHTML = ` 
        <div class="image-container">
          <img src="${product.thumbnail}" alt="${product.title}">
        </div>
        <div class="product-details">
          <span class="product-title">${product.title}</span>
          <span class="product-offer">${offerText}</span>
        </div>
      `;

      container.appendChild(card);
    });

  } catch (error) {
    console.error("Error loading products:", error);
    container.innerHTML = "<p style='color:red;'>Failed to load products. Please refresh.</p>";
  }
}

// Call on load
loadHomePageProducts();