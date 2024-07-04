<?php
session_start();
include 'config.php';

// Function to update cart item quantity
function updateCartItemQuantity($product_id, $quantity)
{
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] = max(1, $quantity); // Ensure quantity is at least 1
            break;
        }
    }
}

// Function to remove item from cart
function removeCartItem($product_id)
{
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_quantity'])) {
        updateCartItemQuantity($_POST['product_id'], $_POST['quantity']);
    } elseif (isset($_POST['remove_item'])) {
        removeCartItem($_POST['product_id']);
    }
    // Redirect to prevent form resubmission
    header("Location: cart.php");
    exit();
}

// Calculate total price
$total_price = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
}

// Fetch updated product information from the database
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $product_ids = array_column($_SESSION['cart'], 'id');
    $product_ids_string = implode(',', $product_ids);

    $sql = "SELECT ProductID, ProductName, Price, ImageURL FROM products WHERE ProductID IN ($product_ids_string)";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[$row['ProductID']] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        .cart-container h1 {
            font-family: "Lobster Two";
            font-size: 36px;
        }
        .cart-container h3 {
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            font-weight: light;
        }
    </style>

</head>

<body>
    <header>
        <!-- Add your header content here -->
    </header>

    <div class="cart-container">
        <h1>Your Shopping Cart</h1>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
                <?php
                $product = $products[$item['id']] ?? null;
                if (!$product) continue; // Skip if product not found in database
                ?>
                <div class="cart-item">
                    <img src="<?php echo htmlspecialchars($product['ImageURL']); ?>" alt="<?php echo htmlspecialchars($product['ProductName']); ?>">
                    <div class="item-details">
                        <h3><?php echo htmlspecialchars($product['ProductName']); ?></h3>
                        <p>Price: $<?php echo number_format($product['Price'], 2); ?></p>
                    </div>
                    <form method="POST" class="quantity-controls">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <button type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" readonly>
                        <button type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                        <button type="submit" name="update_quantity" class="update-btn">Update</button>
                        <button type="submit" name="remove_item" class="remove-btn">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
            <div class="total-price">
                Total: $<?php echo number_format($total_price, 2); ?>
            </div>
            <button onclick="window.location.href='checkout.php' " class="checkout-btn">Proceed to Checkout</button>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
        <a href="product.php" class="back-btn">Back to Products</a>
    </div>

    <footer>
        <!-- Add your footer content here -->
    </footer>
</body>

</html>