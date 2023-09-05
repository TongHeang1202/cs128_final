<?php 
    // Connect to database
    include("layout/connectDB.php");

    $tbl_product = "SELECT * FROM `tbl_product`";
    $q_product = mysqli_query($connection, $tbl_product);
    
    if (!isset($_GET["id"])){
        die("This page does not exist");
    }

    $selected_product = $_GET["id"];
    $not_valid_product = true;
    while($product_list = mysqli_fetch_assoc($q_product)){
        if ($selected_product == $product_list["product_id"]){
            $not_valid_product = false;
            $product_id = $product_list["product_id"];
            $product_name = $product_list["product_name"];
            $product_description = $product_list["product_description"];
            $product_rating = $product_list["rating"];
            $product_rating_count = $product_list["rating_count"];
            $product_price = $product_list["product_price"];
            $product_quantity= $product_list["product_quantity"];
            $product_image = $product_list["product_image"];
            break;
        }
    }
    if ($not_valid_product){
        die("This page does not exist");
    }
    
    $_SESSION["product_id"] = $product_id;
    
    // check if user has put it in cart already
    if (isset($_SESSION["user_id"])){
        $tbl_cart = "SELECT * FROM `tbl_cart` WHERE `product_id` = '$product_id'";
        $q_cart = mysqli_query($connection, $tbl_cart);
        $quantity_in_cart = 0;
        if(mysqli_num_rows($q_cart) > 0){
            while ($row = mysqli_fetch_assoc($q_cart)){
                if ($row["user_id"] == $_SESSION["user_id"]){
                    $quantity_in_cart = $row["cart_quantity"];
                }
            }
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title><?php echo $product_name;?></title>

    <script>
        quantity = <?php echo $quantity_in_cart; ?>;
        stock = <?php echo $product_quantity ?>;
        function add_quantity(){
            if(quantity < stock){
                quantity++;
                document.getElementById("amount-in-cart").innerHTML = quantity;
                document.getElementById("quantity").value = quantity;
            }
        }

        function subtract_quantity(){
            if(quantity > 0){
                quantity--;
                document.getElementById("amount-in-cart").innerHTML = quantity;
                document.getElementById("quantity").value = quantity;
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
        <form class="product-container" action="layout/add-to-cart.php" method="POST">
            <div class="product-image">
                <img src="<?php echo $product_image;?>">
            </div>

            <div class="product-info">
                <div class="product-title">
                    <h1><?php echo $product_name; ?></h1>
                    <p><?php echo $product_description; ?></p>
                </div>
                
                <div class="product-rating">
                    <img src="images/star.png">
                    <?php echo $product_rating . " / 5.0 "; ?>
                    <span><?php echo " (" . $product_rating_count . ")"; ?></span>
                </div>
                
                <h2 class="product-price"><?php echo "$" . $product_price; ?></h2>
                <h2>In Stock: <?php echo $product_quantity; ?></h2>

                <?php 
                if (isset($_SESSION["user_id"])){
                ?>
                    <div class="add-to-cart">
                        <div class="amount-in-cart">
                            <input style="display: none;" type="number" name="quantity" id="quantity">

                            <button type="button" onclick="subtract_quantity()">-</button>
                            <span id="amount-in-cart"><?php echo $quantity_in_cart; ?></span>
                            <button type="button" onclick="add_quantity()">+</button>
                        </div>
                        <button type="submit">Add to Cart</button>
                    </div>
                <?php
                }
                else {
                ?>
                    <a class="sign-in-button" href="login.php">Sign In</a>
                <?php 
                }
                ?>
            </div>
            
        </form>
    </div>
    
    <!-- Put Footer Below This -->
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>
</html>