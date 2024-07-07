<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luhakDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO contacts (name, email) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $name, $email);

  if ($stmt->execute()) {
    $message = "Message sent successfully!";
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Our Team</title>
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    
    <a href="index.php"><img src="logo.png" alt="LUHAK Logo" class="logo"></a>
    <div class="search-bar">
      <input type="text" placeholder="Search for shoes...">
      <button>Search</button>
    </div>
    <nav>
      <a href="index.php">Home</a>
      <a href="product.php">Products</a>
      <a href="aboutpage.html">About</a>
      <a href="contact.php">Contact</a>
    </nav>

  </header>
  <div class="about-us">
    <h2><strong>LUHAK</strong> is more than just an online marketplace; it is a cultural hub dedicated to preserving
      and promoting authentic Cambodian arts, crafts, and traditional techniques. This platform offers a unique
      opportunity for both buyers and sellers to engage in a meaningful and rewarding exchange. Here are compelling
      reasons why you should consider buying and selling at LUHAK.</h2>

  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.573492945606!2d104.89540131114865!3d11.582402688572207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517bf7757d23%3A0x965c34888684bf1!2z4Z6f4Z624Z6A4Z6b4Z6c4Z634Z6R4Z-S4Z6Z4Z624Z6b4Z-Q4Z6Z4Z6i4Z6T4Z-S4Z6P4Z6a4Z6H4Z624Z6P4Z634Z6V4Z624Z6a4Z-J4Z624Z6g4Z-S4Z6C4Z6T!5e0!3m2!1skm!2skh!4v1720105095129!5m2!1skm!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>







  <div class="container">
    <div class="contact-info">
      <h2>2. Contact our team</h2>
      <p>Looking for directions? Our team members are happy to answer any question and provide the guidance you need. We can speak directly to your driver and ensure you get to the market safely and quickly.</p>
      <p>We're open everyday from 8am to 6pm.</p>

      <div class="contact-item">
        <span class="icon">📞</span>
        <span>+855 78 3861 26</span>
      </div>
      <div class="contact-item">
        <span class="icon">✉️</span>
        <span>luhak.com</span>
      </div>
      <div class="contact-item">
        <span class="icon">📍</span>
        <span>Paragon Internatonal University<br> <br>
          Handicraft Association Cambodia</span>
      </div>
      <div class="contact-item">
        <span class="icon">💻</span>
        <span>
          www.luhak.com

        </span>
      </div>
    </div>

    <div class="contact-form">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="email" name="email" placeholder="Your email" required>
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Your message (optional)" rows="5"></textarea>
        <button type="submit">Submit</button>
      </form>
      <?php
      if (!empty($message)) {
        echo "<p>$message</p>";
      }
      ?>
    </div>
  </div>
  <footer>
    <p>&copy; LUHAK. All rights reserved.</p>
  </footer>
</body>

</html>