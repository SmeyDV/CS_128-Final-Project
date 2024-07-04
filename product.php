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
  <link rel="stylesheet" href="product.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
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
              while($row = $result->fetch_assoc()) {
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
            while($row = $result->fetch_assoc()) {
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
