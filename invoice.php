<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $paymentMethod = $_POST['Payment_Method'];

    // Assuming you store the cart information in the session
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $totalAmount = 0;

    // Calculate total amount
    foreach ($cart as $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }
} else {
    // Redirect to form if the request method is not POST
    header("Location: Signup.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="invoice.css">
    <title>Invoice</title>
</head>
<body>
   

    <div class="invoice-container">
        <h1>Invoice</h1>
        <div class="invoice-details">
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
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total Amount</strong></td>
                    <td><strong>$<?= number_format($totalAmount, 2) ?></strong></td>
                </tr>
            </tbody>
        </table>
        
        <button onclick="window.print()">Print Invoice</button>
        <button onclick="window.history.back()">Back</button>
    </div>
</body>
</html>
