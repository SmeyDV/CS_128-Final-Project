<?php
include 'config.php';
session_start();

// Handle add to cart action
if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $found = false;

  if (isset($_SESSION['cart'])) {
    // Check if product is already in the cart
    foreach ($_SESSION['cart'] as &$item) {
      if ($item['id'] == $product_id) {
        $item['quantity'] += 1;
        $found = true;
        break;
      }
    }
  } else {
    $_SESSION['cart'] = [];
  }

  // If product is not found in the cart, add it
  if (!$found) {
    $cart_item = [
      'id' => $product_id,
      'name' => $product_name,
      'price' => $product_price,
      'quantity' => 1
    ];
    $_SESSION['cart'][] = $cart_item;
  }

  header("Location: cart.php");
  exit();
}

$search_term = isset($_GET['search']) ? $_GET['search'] : '';
$product_types = isset($_GET['product_type']) ? $_GET['product_type'] : [];
$product_type_filter = '';

if (!empty($product_types)) {
  $product_type_ids = implode(',', $product_types);
  $product_type_filter = " AND p.ProductTypeID IN ($product_type_ids)";
}

$search_filter = '';
if (!empty($search_term)) {
  $search_term = $conn->real_escape_string($search_term);
  $search_filter = " AND p.ProductName LIKE '%$search_term%'";
}

$sql = "SELECT p.ProductID, p.ProductName, p.Price, p.Description, p.ImageURL
        FROM products p
        JOIN producttypes pt ON p.ProductTypeID = pt.ProductTypeID
        WHERE 1=1 $product_type_filter $search_filter";

$result = $conn->query($sql);

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
      <form method="GET" action="product.php">
        <input type="text" name="search" placeholder="What you looking for...">
        <button type="submit">Search</button>
      </form>
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
        <form method="GET" action="product.php" class="filter-form">
          <ul class="filter-list">
            <?php
            $sql_types = "SELECT ProductTypeID, ProductTypeName FROM producttypes";
            $result_types = $conn->query($sql_types);

            if ($result_types->num_rows > 0) {
              while ($row = $result_types->fetch_assoc()) {
                $checked = isset($_GET['product_type']) && in_array($row['ProductTypeID'], $_GET['product_type']) ? 'checked' : '';
                echo "<li><label><input type='checkbox' name='product_type[]' value='" . $row['ProductTypeID'] . "' $checked> " . $row["ProductTypeName"] . "</label></li>";
              }
            } else {
              echo "<li>No product types available</li>";
            }
            ?>
          </ul>
          <button type="submit" class="filter-button">Filter</button>
        </form>
      </aside>
      <div class="product-list">
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='product-item'>
                                <img src='" . $row["ImageURL"] . "' alt='" . $row["ProductName"] . "' width='150' height='150'>
                                <h3>" . $row["ProductName"] . "</h3>
                                <p>$" . $row["Price"] . "</p>
                                <p>" . $row["Description"] . "</p>
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
  <div class="back-button-container">
    <a href="product.php" class="back-btn">Back</a>
    <a href="#" class="next-btn">Next</a>
    </div>
    <footer>
        <p>&copy; LUHAK. All rights reserved.</p>
    </footer>
</body>

</html>