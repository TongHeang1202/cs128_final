<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title>Piano</title>

    <script>
        function changeCart(id){
            cartImg = document.getElementById("cart"+id);
            imgName = cartImg.src;
            if (imgName.search("images/shopping-cart.png") != -1){
                cartImg.src = "images/shopping-cart-selected.png";
            }
            else {
                cartImg.src = "images/shopping-cart.png";
            }
        }
    </script>
</head>
<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <div class="container1">
        <img class="container-background" src="images/frontpage_images/showcase-banner-background.jpg">
        <h1 class=container-title>PIANO</h1>

        <div class=product-showcase-container>
            <?php 

            for ($i = 0; $i < 10; $i++){
            ?>
                <div class="product-showcase">
                    <div class="product-showcase-name">PlaceHolder</div>
                    <img class="product-showcase-image" src="images/frontpage_images/piano-background.jpg">
                    <div class="product-showcase-tag">
                        <span>$0.00</span>
                        <button class="add-to-cart" onclick="changeCart(<?php echo $i + 1;?>)">
                            <img id="cart<?php echo $i + 1;?>" src="images/shopping-cart.png">
                        </button>
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