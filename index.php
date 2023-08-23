<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title>Ear Candy</title>
</head>

<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <!-- Open Main Body Container -->
    <div class="main-body">

        <!-- Open Banner div -->
        <div class="banner-container">
            <img class="banner-img" src="images/frontpage_images/banner1.jpg">
            <h1 class="banner-caption">Where the music is sweet and the deals are even sweeter</h1>
        </div>
        <!-- Close Banner div -->

        <!-- Open Showcase div -->
        <div class="showcase-banner">
            <img class="showcase-banner-background" src="images/frontpage_images/showcase-banner-background.jpg">
            <div class="product-showcase-container ">

                <div class="product-showcase-header">
                    <h1>Products</h1>
                </div>

                <a class="product-showcase piano" href="#">
                    <img class="product-showcase-background" src="images/frontpage_images/piano-background.jpg">
                    <h1 class="product-showcase-label">Piano</h1>
                </a>

                <a class="product-showcase guitar" href="#">
                    <img class="product-showcase-background" src="images/frontpage_images/guitar-background.jpg">
                    <h1 class="product-showcase-label">Guitar</h1>
                </a>

                <a class="product-showcase violin" href="#">
                    <img class="product-showcase-background" src="images/frontpage_images/violin-background.jpg">
                    <h1 class="product-showcase-label">Violin</h1>
                </a>

            </div>
        </div>
        <!-- Close Showcase div -->

    </div>
    </div>
    <!-- Clsoe Main Body Container -->

    <!-- Put Footer Below This -->
    <div class="footer">
        <div class="footer-top">

            <!-- logo -->
            <div class="footer-link-wrapper">
                <div class="footer-header">Ear Candy</div>
                <img class="ear-candy-logo" src="images/logo.png" alt="">
            </div>
            <!-- end logo -->

            <!-- product -->
            <div class="footer-link-wrapper">
                <div class="footer-header">Products</div>
                <a class="footer-link" href="#">Piano</a>
                <a class="footer-link" href="#">Guitar</a>
                <a class="footer-link" href="#">Violin</a>
            </div>
            <!-- end product -->

            <!-- about -->
            <div class="footer-link-wrapper">
                <div class="footer-header">About</div>
                <a class="footer-link" href="#">Our Team</a>
                <a class="footer-link" href="#">Features</a>
            </div>
            <!-- end about -->

            <!-- contact us -->
            <div class="footer-link-wrapper">
                <div class="footer-header">Contact Us</div>

                <a class="footer-link-img" href="#"><img src="images/footer_image/facebook.png"></a>
                <a class="footer-link-img" href="#"><img src="images/footer_image/instagram.png"></a>
                <a class="footer-link-img" href="#"><img src="images/footer_image/telegram.png"></a>

            </div>
            <!-- end contact us -->
        </div>
        <div class="footer-bottom">EarCandy co.ltd. 2023</div>
    </div>
    <!-- Footer End -->
</body>

</html>