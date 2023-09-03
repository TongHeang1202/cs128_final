<?php 
    // Connect to database
    include("layout/connectDB.php");

    $tbl_category = "SELECT * FROM `tbl_category`";
    $q_category = mysqli_query($connection, $tbl_category);

    $tbl_product = "SELECT * FROM `tbl_product`";

    if (!isset($_GET["category"])){
        die("This page does not exist");
    }

    $selected_category = $_GET["category"];
    $not_valid_category = true;
    while($category_list = mysqli_fetch_assoc($q_category)){
        if ($selected_category == $category_list["category_name"]){
            $not_valid_category = false;
            break;
        }
    }
    if ($not_valid_category){
        die("This page does not exist");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title><?php echo strtoupper($_GET["category"])?></title>

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
        <h1 class="container-title"><?php echo strtoupper($_GET["category"])?></h1>

        <div class="product-showcase-container">
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