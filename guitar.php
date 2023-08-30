<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title>Guitar</title>
</head>
<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <div class="container1">
        <img class="container-background" src="images/frontpage_images/showcase-banner-background.jpg">
        <h1 class=container-title>GUITAR</h1>

        <div class=product-showcase-container>
            <?php 

            for ($i = 0; $i < 10; $i++){
            ?>
                <div class="product-showcase">
                    <div class="product-showcase-name">PlaceHolder</div>
                    <img class="product-showcase-image" src="images/frontpage_images/guitar-background.jpg">
                    <div class="product-showcase-tag">
                        <span>$0.00</span>
                        <img class="add-to-cart" src="images/shopping-cart.png">
                    </div>
                </div>
            <?php
            }
            
            ?>
        </div>

    </div>
    
    <!-- Put Footer Below This -->
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>
</html>