<?php 
    include_once "connectDB.php";

    $quantity = $_POST["quantity"];
    if ($quantity == 0) {
        header("Location: ../product.php?id=" . $product);
    }
    $customer = $_SESSION["customer_id"];
    $product = $_SESSION["product_id"];

    $tbl_cart = "SELECT * FROM `tbl_cart` WHERE `product_id` = '$product'";
    $q_cart = mysqli_query($connection, $tbl_cart);

    if (mysqli_num_rows($q_cart) > 0){
        $correctUser = false;
        while ($row = mysqli_fetch_assoc($q_cart)){
            if ($row["customer_id"] == $customer){
                $sql = "UPDATE `tbl_cart` SET `cart_quantity` = '$quantity' WHERE `product_id` = '$product'";
                mysqli_query($connection, $sql);
                $correctUser = true;
            }
        }

        if (!$correctUser){
            $sql = "INSERT INTO tbl_cart (cart_quantity, discount, total, date, order_details, customer_id, product_id) VALUES ($quantity, 0, 0, '2023-11-11', 0, $customer, $product)";
            mysqli_query($connection, $sql);
        }
    }
    else {
        $sql = "INSERT INTO tbl_cart (cart_quantity, discount, total, date, order_details, customer_id, product_id) VALUES ($quantity, 0, 0, '2023-11-11', 0, $customer, $product)";
        mysqli_query($connection, $sql);
    }

    header("Location: ../product.php?id=" . $product);