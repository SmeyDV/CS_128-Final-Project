<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginpage.php");
    exit();
}

// Fetch user data from the database
$stmt = $conn->prepare("SELECT username, email, age, profile_picture FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$stmt->bind_result($username, $email, $age, $profilePicture);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle age update
    if (isset($_POST['age'])) {
        $age = intval($_POST['age']);
        $stmt = $conn->prepare("UPDATE users SET age = ? WHERE username = ?");
        $stmt->bind_param("is", $age, $username);
        $stmt->execute();
        $stmt->close();
    }

    // Handle profile picture upload
    if (isset($_FILES['profile_picture'])) {
        $targetDir = "uploads/";

        // Check if the directory exists, if not, create it
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "File is not an image.<br>";
        }

        // Check file size
        if ($_FILES["profile_picture"]["size"] > 500000) {
            $uploadOk = 0;
            echo "Sorry, your file is too large.<br>";
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
        } else {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
                // Store the relative path in the database
                $relativePath = $targetFile;
                $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE username = ?");
                $stmt->bind_param("ss", $relativePath, $username);
                $stmt->execute();
                $stmt->close();

                $profilePicture = $relativePath;
                echo "The file ". htmlspecialchars(basename($_FILES["profile_picture"]["name"])). " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
                echo "Error details: " . error_get_last()['message'] . "<br>";
            }
        }
    }
}
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
            <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Picture" class="profile-picture">
            <h1 class="username"><?php echo htmlspecialchars($username); ?></h1>
        </div>
        <div class="profile-details">
            <h2>Profile Details</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
        </div>
        <div class="profile-actions">
            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <label for="age">Update Age:</label>
                <input type="number" id="age" name="age" min="1" max="120" value="<?php echo htmlspecialchars($age); ?>" required>
                <br>
                <label for="profile_picture">Upload Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                <br>
                <input type="submit" value="Update Profile">
            </form>
            <a href="index.php" class="back-button">Back</a>
            <a href="edit_profile.php" class="edit-button">Edit Profile</a>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
</body>

</html>
