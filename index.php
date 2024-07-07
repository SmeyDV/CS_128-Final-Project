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
    <link rel="stylesheet" href="image-slider.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        .signup-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .signup-section {
            background-color: #e0a800;
            color: white;
            padding: 2rem;
            text-align: center;
            border-radius: 8px;
            width: 1200px;
        }

        .signup-section h2 {
            margin-bottom: 1rem;
        }

        .signup-section form {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .signup-section input[type="email"] {
            padding: 0.5rem;
            width: 60%;
            max-width: 300px;
        }

        .signup-section input[type="submit"] {
            padding: 0.5rem 1rem;
            background-color: #4a4a4a;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .signup-section input[type="submit"]:hover {
            background-color: #333;
        }
    </style>


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
            <a href="product.php">Products</a>
            <a href="aboutpage.html">About</a>
            <a href="contact.php">Contact</a>
        </nav>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
            <div class="account-info">

                <a href="logout.php" class="login-button">Logout</a>
            </div>
        <?php else : ?>
            <a href="loginpage.php" class="login-button">Log in</a>
            <a href="signuppage.php" class="signup-button-header">Sign Up</a>
        <?php endif; ?>
        <a href="profile.php" class="account-icon"><i class="fa-regular fa-user fa-lg"></i></a>

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
                <a href="product.php" class="cta-button">Explore Our Collection</a>
            </div>

        </section>

        <!--  -->
        <section class="part2">
            <div class="my-text">
                <h1><strong>LUHAK </strong>is a handcraft marketplace dedicated to authentic Cambodian arts, crafts and
                    traditional
                    techniques dating back more than seven centuries to the ancient city of Angkor.
                </h1>
            </div>
            <div class="part2-content">
                <div class="container-slider">
                    <div class="slider-wrapper">
                        <button id="prev-slide" class="slide-button material-symbols-rounded">
                            &#xE5CB;
                        </button>
                        <ul class="image-list">
                            <img class="image-item" src="https://www.khmertimeskh.com/wp-content/uploads/2024/04/80734.jpg" alt="img-1" />
                            <img class="image-item" src="https://www.khmertimeskh.com/wp-content/uploads/2020/08/7125.jpg" alt="img-2" />
                            <img class="image-item" src="https://www.khmertimeskh.com/wp-content/uploads/2024/04/80737.jpg" alt="img-3" />
                            <img class="image-item" src="https://siemreap.net/wp-content/uploads/2023/05/Sombai-Painted_bottles-1024x680.jpg" alt="img-4" />
                            <img class="image-item" src="https://www.thefairtradevillage.com/wp-content/gallery/stone-production/FTV-Stone-Product_AHA-7333.jpg" alt="img-5" />
                            <img class="image-item" src="https://thebettercambodia.com/wp-content/uploads/2022/08/istock-827740356-cropped-1624019228.jpg" alt="img-6" />
                            <img class="image-item" src="https://www.thefairtradevillage.com/wp-content/gallery/stone-production/FTV-Stone-Product_AHA-1206.jpg" alt="img-7" />
                            <img class="image-item" src="https://i.pinimg.com/736x/26/01/da/2601dafbb85a5e8c686ba8bfaaa24357.jpg" alt="img-8" />
                            <img class="image-item" src="https://pppenglish.sgp1.digitaloceanspaces.com/image/main/field/image/18-grass1.jpg" alt="img-9" />
                            <img class="image-item" src="https://www.topasiatour.com/pic/cambodia/guide/silverware.jpg" alt="img-10" />
                        </ul>
                        <button id="next-slide" class="slide-button material-symbols-rounded">

                            &#xE5CC;
                        </button>
                    </div>
                    <div class="slider-scrollbar">
                        <div class="scrollbar-track">
                            <div class="scrollbar-thumb"></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--  -->
        <section class="part3">
        <div class="part3-content">
            <h1>Our Blog</h1>
            <hr>
            <div class="part3-content-pic">
                <div class="blog-card">
                    <img src="https://www.thefairtradevillage.com/wp-content/uploads/2019/06/AHA-Official-Seal-of-Authenticity.jpg" alt="Genuine Cambodian handmade gifts">
                    <div class="blog-content">
                        <h4>Finding genuine Cambodian handmade gifts</h4>
                        <p class="date">June 6, 2019</p>
                        <p>In busy workshops at Siem Reap's Fair Trade Village, some of Cambodia's most accomplished artisans are busy creating carvings, ceramics, jewelry and …</p>
                        <button>Read more</button>
                    </div>
                </div>
                <div class="blog-card">
                    <img src="https://pppenglish.sgp1.digitaloceanspaces.com/image/main/20243/25_3_2024_hol_dgi.jpg" alt="Hol Pidan Exhibition">
                    <div class="blog-content">
                        <h4>Hol Pidan Exhibition in Phnom Penh</h4>
                        <p class="date">March 21 to June 21, 2024</p>
                        <p>The National Museum of Cambodia is currently hosting an exhibition dedicated to Hol Pidan fabrics, which showcases the intricate and culturally significant Khmer handicraft …</p>
                        <button>Read more</button>
                    </div>
                </div>
                <div class="blog-card">
                    <img src="https://moitruongdulich.vn/en/mypicture/images/Myfolder/2023/T7/287Traditional-bamboo-weaving-helps-Khmer-people-in-Soc-Trang-escape-poverty-1.jpg" alt="Khmer Handicraft Villages">
                    <div class="blog-content">
                        <h4>Expansion of Khmer Handicraft Villages in Vietnam</h4>
                        <p class="date">December 01, 2018</p>
                        <p>Vietnam's Trà Vinh Province, several ethnic Khmer handicraft villages have experienced significant growth. The villages in Đại An and Hàm Giang communes, as well as the sedge mat weaving village in Hàm Tân,…</p>
                        <button>Read more</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="signup-container">
            <section class="signup-section">
                <h2>Stay Updated!</h2>
                <form action="#" method="POST">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <input type="submit" value="Sign Up">
                </form>
            </section>
        </div>
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

        setInterval(changeImage, 5000); // Change image every 5 seconds
    </script>
    <script src="https://kit.fontawesome.com/1f1017027a.js" crossorigin="anonymous"></script>
    <script src="image-slider.js" defer></script>

</body>

</html>