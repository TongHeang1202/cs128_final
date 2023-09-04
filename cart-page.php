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

        <div class="column-class">
            <h3 style="width:100px; display:block;">Image</h3>
            <h3 style="width:300px; display:block;">Name</h3>
            <h3 style="width:100px;">Price</h3>
            <h3 style="width:100px;">Quantity</h3>
            <h3 style="width:100px;"></h3>
        </div>

        <?php 

        for ($i = 0; $i < 5; $i++){
        ?>
            <div class="products">
                <div class="product-image">
                    <img src="images/frontpage_images/piano-background.jpg">
                </div>
                <div class="product-name">
                    <h1>PlaceHolder</h1>
                    <p>placeholder</p>
                </div>
                <h1 class="product-price">$0.00</h1>
                <div class="product-quantity">
                    <button class="quantity-remove">-</button>
                    <h1 class="quantity">0</h1>
                    <button class="quantity-add">+</button>
                </div>
                <div class="remove-button">Remove</div>
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