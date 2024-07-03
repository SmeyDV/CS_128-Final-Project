<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginpage.php");
    exit();
}

// Sample user data for demonstration purposes. In a real application, this should be fetched from the database.
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>User Profile</title>
</head>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="profile-picture.png" alt="Profile Picture" class="profile-picture">
            <h1 class="username"><?php echo htmlspecialchars($username); ?></h1>
            
        </div>
        <div class="profile-details">
            <h2>Profile Details</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <!-- Add more profile details here -->
        </div>
        <div class="profile-actions">
            <a href="edit_profile.php" class="edit-button">Edit Profile</a>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
</body>

</html>

