<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lohak Handcraft Market</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
<header>
        <a href="index.php"> <img src="logo.png" class="logo" alt="Logo"></a>
        <div class="search-bar">
            <input type="text" placeholder="What you looking for...">
            <button>Search</button>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="product.html">Products</a>
            <a href="aboutpage.html">About</a>
            <a href="#">Contact</a>
        </nav>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
            <div class="account-info">
                
                <a href="logout.php" class="login-button">Logout</a>
            </div>
        <?php else : ?>
            <a href="loginpage.php" class="login-button">Log in</a>
            <a href="signup.html" class="signup-button-header">Sign Up</a>
        <?php endif; ?>
        <a href="profile.php" class="account-icon"><i class="fa-regular fa-user fa-lg"></i></a>
        <a href="#" class="cart-icon">🛒 <span>0</span></a>
    </header>


    <main>
        <section class="hero">
            <div class="hero-slider">
                <img src="https://t4.ftcdn.net/jpg/01/02/53/49/360_F_102534906_tiedDFfDfgpIRwF7dPSU4zV2NvDtjh0S.jpg" alt="Khmer handcraft 1" class="active">
                <img src="https://www.thefairtradevillage.com/wp-content/uploads/2019/06/FTV-Ceramics-Product_AHA-7323.jpg" alt="Khmer handcraft 2">
                <img src="https://www.aptouring.com.au/-/media/travelmarvel-responsive-website/people/people-16-9/gi-t-as-cambodia-apsara-dancers-5177220-d-16-9.jpg" alt="Khmer handcraft 3">
                <img src="https://satcha-handicraft.com/wp-content/uploads/2022/12/IMG_6059-HDR.jpg" alt="Khmer handcraft 4">
                <img src="https://satcha-handicraft.com/wp-content/uploads/2022/12/IMG_6281-HDR.jpg" alt="Khmer handcraft 5">
            </div>
            <div class="slider-nav"></div>
            <div class="hero-content">
                <h1>Experience the Artistry of Cambodian Handcrafts</h1>
                <p>Discover pure Khmer handcraft product</p>
                <a href="product.html" class="cta-button">Explore Our Collection</a>
            </div>
        </section>

        <div class="part2-content">
            <h1><strong>LUHAK </strong>is a handcraft marketplace dedicated to authentic Cambodian arts, crafts and
                traditional
                techniques dating back more than seven centuries to the ancient city of Angkor.
            </h1>
            <div class="part2-content-pic">
                <img src="https://www.cambodiaembassyuk.org/wp-content/uploads/2021/12/8.-Admire-Khmer-arts-handicrafts-1024x640.webp">

                <p>
                    Our marketplace is dedicated to preserving and celebrating the rich cultural heritage of
                    Cambodia.
                </p>
            </div>
        </div>
        
        <section class="part3">
            <div class="part3-content">
                <h1>Our Blog</h1>
                <hr>

                <div class="part3-content-pic">
                    <div>
                        <img src="https://www.thefairtradevillage.com/wp-content/uploads/2019/06/AHA-Official-Seal-of-Authenticity.jpg" alt="Image 1">
                        <h4>Finding genuine Cambodian handmade gifts </h4>
                        <p style="font-weight:lighter; color:gray; padding-bottom:10px;">June 6, 2019</p>
                        <p>In busy workshops at Siem Reap’s Fair Trade Village, some of Cambodia’s most accomplished
                            artisans are busy creating carvings, ceramics, jewelry and …</p>
                        <button>Read more</button>
                    </div>
                    <div>
                        <img src="https://pppenglish.sgp1.digitaloceanspaces.com/image/main/20243/25_3_2024_hol_dgi.jpg" alt="Image 1">
                        <h4>Hol Pidan Exhibition in Phnom Penh</h4>
                        <p style="font-weight:lighter; color:gray; padding-bottom:10px;">March 21 to June 21, 2024</p>
                        <p>The National Museum of Cambodia is currently hosting an exhibition dedicated to Hol Pidan fabrics, which showcases the intricate and culturally significant Khmer handicraft …</p>
                        <button>Read more</button>
                    </div>
                    <div>
                        <img src="https://moitruongdulich.vn/en/mypicture/images/Myfolder/2023/T7/287Traditional-bamboo-weaving-helps-Khmer-people-in-Soc-Trang-escape-poverty-1.jpg" alt="Image 1">
                        <h4>Expansion of Khmer Handicraft Villages in Vietnam</h4>
                        <p style="font-weight:lighter; color:gray; padding-bottom:10px;">December 01, 2018</p>
                        <p>Vietnam's Trà Vinh Province, several ethnic Khmer handicraft villages have experienced significant growth The villages in Đại An and Hàm Giang communes, as well as the sedge mat weaving village in Hàm Tân,…</p>
                        <button>Read more</button>
                    </div>
                </div>
            </div>
        </section>
        <hr>

        <section class="part4">
            <div class="signup-section">
                <h2>Stay Updated!</h2>
                <form action="#" method="POST">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; LUHAK. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <script>
        const images = document.querySelectorAll('.hero-slider img');
        let currentImage = 0;

        function changeImage() {
            images[currentImage].classList.remove('active');
            currentImage = (currentImage + 1) % images.length;
            images[currentImage].classList.add('active');
        }

        setInterval(changeImage, 4000); // Change image every 4 seconds
    </script>
    <script src="https://kit.fontawesome.com/1f1017027a.js" crossorigin="anonymous"></script>
</body>

</html>