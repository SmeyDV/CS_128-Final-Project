document.addEventListener("DOMContentLoaded", function() {
  // Product data
  const products = [
    { name: "Product 1", price: "$10", description: "Description for Product 1", imageUrl: "https://via.placeholder.com/150" },
    { name: "Product 2", price: "$20", description: "Description for Product 2", imageUrl: "https://via.placeholder.com/150" },
    { name: "Product 3", price: "$30", description: "Description for Product 3", imageUrl: "https://via.placeholder.com/150" },
    { name: "Product 4", price: "$40", description: "Description for Product 4", imageUrl: "https://via.placeholder.com/150" },
    { name: "Product 5", price: "$50", description: "Description for Product 5", imageUrl: "https://via.placeholder.com/150" },
    { name: "Product 6", price: "$60", description: "Description for Product 6", imageUrl: "https://via.placeholder.com/150" }
  ];

  // Select the product list container
  const productList = document.querySelector(".product-list");

  // Function to create a product element
  function createProductElement(product) {
    const productDiv = document.createElement("div");
    productDiv.classList.add("product");

    const productImage = document.createElement("img");
    productImage.src = product.imageUrl;
    productImage.alt = product.name;

    const productName = document.createElement("h3");
    productName.textContent = product.name;

    const productPrice = document.createElement("p");
    productPrice.textContent = product.price;

    const productDescription = document.createElement("p");
    productDescription.textContent = product.description;

    const addToCartButton = document.createElement("button");
    addToCartButton.textContent = "Add to Cart";
    addToCartButton.classList.add("add-to-cart");

    const buyButton = document.createElement("button");
    buyButton.textContent = "Buy";
    buyButton.classList.add("buy");

    productDiv.appendChild(productImage);
    productDiv.appendChild(productName);
    productDiv.appendChild(productPrice);
    productDiv.appendChild(productDescription);
    productDiv.appendChild(addToCartButton);
    productDiv.appendChild(buyButton);

    return productDiv;
  }

  // Add products to the product list
  products.forEach(product => {
    const productElement = createProductElement(product);
    productList.appendChild(productElement);
  });
});