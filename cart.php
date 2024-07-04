<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
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

  <section id="cart">
    <h2>Shopping Cart</h2>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo "<ul id='cart-items'>";
        foreach ($_SESSION['cart'] as $item) {
            echo "<li>
                    <h3>" . $item['name'] . "</h3>
                    <p>Price: $" . $item['price'] . "</p>
                  </li>";
        }
        echo "</ul>";
        echo "<button id='checkout-btn'>Checkout</button>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
  </section>
</body>
</html>
