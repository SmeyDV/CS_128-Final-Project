<?php
session_start();

// Redirect if not a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: Signup.php");
    exit();
}

// Sanitize and validate input
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
$paymentMethod = filter_input(INPUT_POST, 'Payment_Method', FILTER_SANITIZE_STRING);

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// Get cart from session
$cart = $_SESSION['cart'] ?? [];

// Calculate total amount
$totalAmount = array_reduce($cart, function($carry, $item) {
    return $carry + ($item['price'] * $item['quantity']);
}, 0);

// Generate invoice number
$invoiceNumber = 'INV-' . date('Ymd') . '-' . sprintf('%04d', rand(0, 9999));

// Get current date
$currentDate = date('F j, Y');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - LUHAK</title>
    <link rel="stylesheet" href="invoice.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
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

    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <h1>Invoice</h1>
                <p><strong>Invoice Number:</strong> <?= htmlspecialchars($invoiceNumber) ?></p>
                <p><strong>Date:</strong> <?= htmlspecialchars($currentDate) ?></p>
            </div>
            <div>
                <img src="inverted_logo.png" alt="LUHAK Logo">
            </div>
        </div>

        <div class="invoice-details">
            <h2>Customer Details</h2>
            <p><strong>Name:</strong> <?= htmlspecialchars($username) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Address:</strong> <?= nl2br(htmlspecialchars($address)) ?></p>
            <p><strong>Phone Number:</strong> <?= htmlspecialchars($phonenumber) ?></p>
            <p><strong>Payment Method:</strong> <?= htmlspecialchars($paymentMethod) ?></p>
        </div>

        <h2>Order Summary</h2>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item) : ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="3">Total Amount</td>
                    <td>$<?= number_format($totalAmount, 2) ?></td>
                </tr>
            </tbody>
        </table>

        <div class="button-container">
            <button onclick="window.print()">Print Invoice</button>
            <button onclick="window.location.href='index.php'">Back to Home</button>
        </div>
    </div>
</body>
</html>