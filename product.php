<?php
include 'config.php';
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
    <a href="#" class="cart-icon">🛒 <span>0</span></a>
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
        $sql = "SELECT p.ProductName, p.Price, p.Description, p.ImageURL, pt.ProductTypeName 
                FROM products p
                JOIN producttypes pt ON p.ProductTypeID = pt.ProductTypeID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product-item'>
                        <img src='" . $row["ImageURL"] . "' alt='" . $row["ProductName"] . "'>
                        <h3>" . $row["ProductName"] . "</h3>
                        <p>$" . $row["Price"] . "</p>
                        <p>" . $row["Description"] . "</p>
                        <p>Type: " . $row["ProductTypeName"] . "</p>
                        <button>Add to Cart</button>
                        <button>Buy</button>
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

  <script src="script.js"></script>
</body>
</html>
