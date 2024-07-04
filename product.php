<?php
include 'config.php';

// Start session to handle the cart
session_start();

// Handle add to cart action
if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];

  $cart_item = [
    'id' => $product_id,
    'name' => $product_name,
    'price' => $product_price
  ];

  if (isset($_SESSION['cart'])) {
    array_push($_SESSION['cart'], $cart_item);
  } else {
    $_SESSION['cart'] = [$cart_item];
  }

  header("Location: cart.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

  <style>
    #products {
      padding: 40px;
      text-align: center;
    }

    #products h2 {
      font-size: 2.5rem;
      margin-bottom: 40px;
    }

    .container {
      display: flex;
    }

    aside {
      width: 200px;
      padding: 10px;
      border-right: 1px solid #ddd;
    }

    aside h3 {
      margin-top: 0;
    }

    aside ul {
      list-style: none;
      padding: 0;
    }

    aside ul li {
      padding: 8px 0;
    }

    .product-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      flex: 1;
    }

    .product-item {
      background-color: rgb(238, 234, 234);
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
      margin: 10px;
      width: 200px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-item:hover {
      transform: translateY(-5px);
    }

    .product-item img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin: 0 auto;
      border-radius: 8px;
    }

    .product-info {
      padding: 15px;
    }

    .product-item h3 {
      margin: 10px 0;
      font-family: 'Open Sans', sans-serif;
    }

    .product-item p {
      margin: 5px 0;
      color: #2c3e50;
    }

    .product-item button {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin: 5px 0;
    }

    .product-item button:hover {
      background-color: #2980b9;
    }

    .product-item .add-to-cart {
      background-color: #4CAF50;
    }

    .product-item .add-to-cart:hover {
      background-color: #45a049;
    }

    .product-item .buy {
      background-color: #f44336;
    }

    .product-item .buy:hover {
      background-color: #e53935;
    }
  </style>
</head>

<body>
  <header>
    <img src="logo.png" class="logo" alt="LUHAK Logo">
    <div class="search-bar">
      <input type="text" placeholder="Search for shoes...">
      <button>Search</button>
    </div>
    <nav>
      <a href="index.php">Home</a>
      <a href="product.php">Products</a>
      <a href="aboutpage.html">About</a>
      <a href="#">Contact</a>
    </nav>
    <a href="cart.php" class="cart-icon">🛒 <span><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?></span></a>
  </header>

  <section id="products">
    <h2>Our Products</h2>
    <div class="container">
      <aside>
        <h3>Product Types</h3>
        <ul>
          <?php
          $sql = "SELECT ProductTypeName FROM producttypes";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<li>" . $row["ProductTypeName"] . "</li>";
            }
          } else {
            echo "<li>No product types available</li>";
          }
          ?>
        </ul>
      </aside>
      <div class="product-list">
        <?php
        $sql = "SELECT p.ProductID, p.ProductName, p.Price, p.Description, p.ImageURL, pt.ProductTypeName 
                FROM products p
                JOIN producttypes pt ON p.ProductTypeID = pt.ProductTypeID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='product-item'>
                        <img src='" . $row["ImageURL"] . "' alt='" . $row["ProductName"] . "' width='150' height='150'>
                        <h3>" . $row["ProductName"] . "</h3>
                        <p>$" . $row["Price"] . "</p>
                        <p>" . $row["Description"] . "</p>
                        <p>Type: " . $row["ProductTypeName"] . "</p>
                        <form method='POST' action='product.php'>
                            <input type='hidden' name='product_id' value='" . $row["ProductID"] . "'>
                            <input type='hidden' name='product_name' value='" . $row["ProductName"] . "'>
                            <input type='hidden' name='product_price' value='" . $row["Price"] . "'>
                            <button type='submit' name='add_to_cart' class='add-to-cart'>Add to Cart</button>
                        </form>
                      </div>";
          }
        } else {
          echo "<p>No products available</p>";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </section>
</body>

</html>