<?php 
    // Connect to database
    include("layout/connectDB.php");

    if (!isset($_SESSION["user_id"])) header("location: index.php");

    $customer = $_SESSION["user_id"];

    $tbl_cart = "SELECT * FROM `tbl_cart` WHERE `user_id` = '$customer'";
    $q_cart = mysqli_query($connection, $tbl_cart);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/cart-page.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title>Cart</title>

    <script>
        function add_quantity(id, stock){
            quantity = parseInt(document.getElementById("quantity" + id).innerHTML);
            if(quantity < stock){
            quantity++;
            document.getElementById("quantity" + id).innerHTML = quantity;
            }
        }

        function subtract_quantity(id,stock){
            quantity = parseInt(document.getElementById("quantity" + id).innerHTML);
            if(quantity > 0){
                quantity--;
                document.getElementById("quantity" + id).innerHTML = quantity;
            }
        }
    </script>
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

        while ($cart_item = mysqli_fetch_assoc($q_cart)){
            $product_id = $cart_item["product_id"];
            $tbl_product = "SELECT * FROM `tbl_product` WHERE `product_id` = $product_id";
            $q_product = mysqli_query($connection, $tbl_product);
            $product = mysqli_fetch_assoc($q_product);
            $product_stock = $product["product_quantity"];

            if ($cart_item["cart_quantity"] == 0) continue;
        ?>
            <div class="products">
                <div class="product-image">
                    <img src="<?php echo $product["product_image"]; ?>">
                </div>
                <div class="product-name">
                    <h1><?php echo $product["product_name"]; ?></h1>
                    <p><?php echo $product["product_description"]; ?></p>
                </div>
                <h1 class="product-price"><?php echo "$" . $product["product_price"]; ?></h1>
                <div class="product-quantity">
                    <button class="quantity-remove" onclick="subtract_quantity(<?php echo $product_id . ',' . $product_stock;?>)">-</button>
                    <h1 id="quantity<?php echo $product_id;?>" class="quantity"  ><?php echo $cart_item["cart_quantity"]; ?></h1>
                    <button class="quantity-add" onclick="add_quantity(<?php echo $product_id . ',' . $product_stock;?>)">+</button>
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