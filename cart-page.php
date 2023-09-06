<?php 
    // Connect to database
    include("layout/connectDB.php");

    if (!isset($_SESSION["user_id"])) header("location: index.php");

    $customer = $_SESSION["user_id"];

    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $array = $_SESSION["id_array"];
        for ($i = 0; $i < count($array); $i++){
            $product_q = $_POST["quantity".$array[$i]];
            $sql = "UPDATE `tbl_cart` SET `cart_quantity` = '$product_q' WHERE `product_id` = '$array[$i]' AND `user_id` = '$customer'";
            mysqli_query($connection, $sql);
        }
    }
    
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
                document.getElementById("input" + id).value = quantity;
                document.getElementById("submit-button").style.display = "flex";
            }
        }

        function subtract_quantity(id,stock){
            quantity = parseInt(document.getElementById("quantity" + id).innerHTML);
            if(quantity > 0){
                quantity--;
                document.getElementById("quantity" + id).innerHTML = quantity;
                document.getElementById("input" + id).value = quantity;
                document.getElementById("submit-button").style.display = "flex";
            }
        }

        function remove(id){
                document.getElementById("quantity" + id).innerHTML = 0;
                document.getElementById("input" + id).value = 0;
        }
    </script>
</head>

<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <!-- Open Main Body Container -->
    <form class="main-body" action="cart-page.php" method="POST">

        <div class="column-class">
            <h3 style="width:100px; display:block;">Image</h3>
            <h3 style="width:300px; display:block;">Name</h3>
            <h3 style="width:100px;">Price</h3>
            <h3 style="width:100px;">Quantity</h3>
            <h3 style="width:100px;">
                <button id="submit-button" type="submit">Save Changes</button>
            </h3>
        </div>

        <?php 

        $id_array = array();
        while ($cart_item = mysqli_fetch_assoc($q_cart)){
            $product_id = $cart_item["product_id"];
            $tbl_product = "SELECT * FROM `tbl_product` WHERE `product_id` = $product_id";
            $q_product = mysqli_query($connection, $tbl_product);
            $product = mysqli_fetch_assoc($q_product);
            $product_stock = $product["product_quantity"];

            if ($cart_item["cart_quantity"] == 0) continue;
            array_push($id_array, $product_id);
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
                    <input style="display:none;" name="quantity<?php echo $product_id?>" id="input<?php echo $product_id?>" value="<?php echo $cart_item["cart_quantity"]; ?>">
                    <button type="button" class="quantity-remove" onclick="subtract_quantity(<?php echo $product_id . ',' . $product_stock;?>)">-</button>
                    <h1 id="quantity<?php echo $product_id;?>" class="quantity"  ><?php echo $cart_item["cart_quantity"]; ?></h1>
                    <button type="button" class="quantity-add" onclick="add_quantity(<?php echo $product_id . ',' . $product_stock;?>)">+</button>
                </div>
                <button type="submit" onclick="remove(<?php echo $product_id?>)" class="remove-button">Remove</div>
            </div>
        <?php
        }

        ?>
        <?php $_SESSION["id_array"] = $id_array ?>
    </form>
    <!-- Close Main Body div -->

    <!-- Put Footer Below This -->
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>

</html>