<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out - LUHAK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="checkout.css">
    <style>
       
    </style>
</head>
<body>
    <header>
        <a href="index.php"><img src="logo.png" alt="LUHAK Logo" class="logo"></a>
        <nav>
            <a href="index.php">Home</a>
            <a href="product.php">Products</a>
            <a href="aboutpage.html">About</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <div class="signup-container">
        <form class="signup-form" action="Invoice.php" method="post">
            <h2>Complete Your Order</h2>
            
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
            
            <label for="address">Address:</label>
            <textarea name="address" id="address" rows="2" placeholder="City/Town, Country" required></textarea>
            
            <label for="phonenumber">Phone Number:</label>
            <input type="tel" id="phonenumber" name="phonenumber" placeholder="+855" required>
            
            <label>Payment Method:</label>
            <div class="payment-options">
                <label>
                    <input type="radio" name="Payment_Method" value="Paypal" checked>
                    PayPal
                    <img src="https://www.leceipt.com/wp-content/uploads/2022/05/paypal-logo.png" alt="PayPal logo">
                </label>
                <label>
                    <input type="radio" name="Payment_Method" value="Visa / Mastercard">
                    Visa / Mastercard
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1024px-MasterCard_Logo.svg.png" alt="Visa/Mastercard logo">
                </label>
                <label>
                    <input type="radio" name="Payment_Method" value="ABA Pay">
                    ABA
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqf8MAXi124yXvmePpK7rdL76C3Ko7x0NYLw&s" alt="ABA logo">
                </label>
                <label>
                    <input type="radio" name="Payment_Method" value="Acleda Pay">
                    Acleda
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRM37KLHTgu31C4LMRGMBzIu7QwwJXVeOC-EA&s" alt="Acleda logo">
                </label>
            </div>

            <div class="form-buttons">
                <button type="submit">Complete Order</button>
                <button type="button" onclick="window.location.href='Cart.php'">Back to Cart</button>
            </div>
        </form>
    </div>
</body>
</html>