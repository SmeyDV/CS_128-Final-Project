<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful, set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username']; // Set the username in session
            $_SESSION['email'] = $email;
            header("Location: index.php"); // Redirect to index.php after successful login
            exit();
        } else {
            // Invalid credentials
            $_SESSION['error'] = "Invalid email or password.";
        }
    } else {
        // Invalid credentials
        $_SESSION['error'] = "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
header("Location: loginpage.php"); // Redirect back to the login page
exit();
