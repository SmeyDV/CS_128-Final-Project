<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out - LUHAK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0a283f;
            --secondary-color: #f4f4f4;
            --accent-color: #2c8ac6;
            --text-color: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', 'Noto Sans Khmer', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--secondary-color);
        }

        header {
            background-color: var(--primary-color);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            height: 80px;
            width:80px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: var(--accent-color);
        }

        .signup-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signup-form h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .signup-form label {
            display: block;
            margin-top: 1rem;
            font-weight: 500;
        }

        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form textarea {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .signup-form textarea {
            resize: vertical;
        }

        .payment-options {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }

        .payment-options label {
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }

        .payment-options img {
            height: 30px;
            margin-left: 0.5rem;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .form-buttons button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-buttons button[type="submit"] {
            background-color: var(--accent-color);
            color: white;
        }

        .form-buttons button[type="button"] {
            background-color: var(--secondary-color);
            color: var(--text-color);
        }

        .form-buttons button:hover {
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 1rem;
            }

            nav {
                margin-top: 1rem;
            }

            nav a {
                margin: 0 0.5rem;
            }

            .signup-container {
                margin: 1rem;
                padding: 1rem;
            }

            .form-buttons {
                flex-direction: column;
            }

            .form-buttons button {
                margin-top: 1rem;
            }
        }
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
                    <input type="radio" name="Payment_Method" value="Visa / Mastercard">
                    ABA
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqf8MAXi124yXvmePpK7rdL76C3Ko7x0NYLw&s" alt="Visa/Mastercard logo">
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