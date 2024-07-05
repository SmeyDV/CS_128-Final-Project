<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>

<div class="signup-container">
        <form class="signup-form" action="Invoice.php" method="post">
            <h2>Fill out your info!</h2>
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>

            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="30" rows="2" placeholder="City/Town, Country"></textarea>

            <label for="phonenumber">Phone Number:</label>
            <input type="text" id="phonenumber" name="phonenumber" placeholder="+855" required>

            <label for="Payment Method">Payment Method:</label>
            <input type="radio" name="Payment_Method" value="Paypal" checked> Paypal <img src="https://www.leceipt.com/wp-content/uploads/2022/05/paypal-logo.png" alt="" height="30px" width="30%"><br>
            <input type="radio" name="Payment_Method" value="Visa / Mastercard"> Visa / Mastercard <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1024px-MasterCard_Logo.svg.png" alt="" height="30px" width="30%">

            <div class="form-buttons">
                <button type="submit">Check Out</button>
                <button type="button" onclick="window.location.href='Cart.php'">Back to Cart</button>
            </div>
        </form>
    </div>

</body>
</html>
