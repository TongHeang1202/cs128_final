<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/cart-page.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title>Ear Candy</title>
</head>

<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <!-- Open Main Body Container -->
    <div class="main-body">
        <?php 

        for ($i = 0; $i < 5; $i++){
        ?>
            <div class="products">
                <img class="product-image" src="images/frontpage_images/piano-background.jpg">
                <h1 class="product-name">PlaceHolder</h1>
                <h1 class="product-price">$0.00</h1>
                <div class="product-quantity">
                    <button class="quantity-remove">-</button>
                    <h1 class="quantity">0</h1>
                    <button class="quantity-add">+</button>
                </div>
                <h1 class="product-price-total">$0.00</h1>
            </div>
        <?php
        }

        ?>
    </div>
    <!-- Close Main Body div -->

    <!-- Put Footer Below This -->
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>

</html>