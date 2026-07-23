// 1. Function to fetch products based on category ID
async function fetchAndDisplayProducts(categoryId) {
  const container = document.getElementById("product-grid");
  const sectionTitle = document.querySelector(".section-title");

  // Show loading message while fetching
  container.innerHTML = "<p>Loading products...</p>";

  // Handle the "For You" (hi) special ID by showing all products
  let apiUrl = `https://dummyjson.com/products/category/${categoryId}?limit=8`;
  if (categoryId === "hi") {
    apiUrl = "https://dummyjson.com/products?limit=10&skip=0";
  }

  try {
    const response = await fetch(apiUrl);
    
    if (!response.ok) {
      throw new Error("Failed to fetch products");
    }

    const data = await response.json();
    const products = data.products;

    // Clear loading text
    container.innerHTML = "";

    // Loop through products and create card elements
    products.forEach(product => {
      const card = document.createElement("div");
      card.classList.add("product-card");

      const offerText = product.discountPercentage 
        ? `Min. ${Math.round(product.discountPercentage)}% Off` 
        : "Special offer";

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
    container.innerHTML = "<p style='color:red;'>no productsinside this category.</p>";
  }
}


// 2. Select all category items
const categoryItems = document.querySelectorAll(".category");

// 3. Add mouseenter event listener to each category
categoryItems.forEach(item => {
  item.addEventListener("mouseenter", () => {
    const categoryId = item.id;
    
    // Update the section title text to match the hovered category
    const categoryName = item.querySelector("p").textContent;
    document.querySelector(".section-title").textContent = categoryName;

    // Fetch new products
    fetchAndDisplayProducts(categoryId);
  });
});


// 4. Default load when page opens (e.g. Smartphones)
fetchAndDisplayProducts("smartphones");