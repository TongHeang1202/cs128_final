<? 

include("include/db-connection.php");
$sql = 

?>


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

                <a class="product-showcase piano" href="piano.php">
                    <img class="product-showcase-background" src="images/frontpage_images/piano-background.jpg">
                    <h1 class="product-showcase-label">Piano</h1>
                </a>

                <a class="product-showcase guitar" href="guitar.php">
                    <img class="product-showcase-background" src="images/frontpage_images/guitar-background.jpg">
                    <h1 class="product-showcase-label">Guitar</h1>
                </a>

                <a class="product-showcase violin" href="violin.php">
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
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>

</html>