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
            $product_price = $product_list["product_price"];
            $product_image = $product_list["product_image"];
            break;
        }
    }
    if ($not_valid_product){
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
    <link href="css/product.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <title><?php echo $product_name;?></title>
</head>
<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <div class="container1">
        <img class="container-background" src="images/frontpage_images/showcase-banner-background.jpg">
        <div class="product-container">
            <div class="product-image">
                <img src="<?php echo "images/" . $product_image;?>">
            </div>

            <div class="product-info">
                <div>
                    <h1><?php echo $product_name; ?></h1>
                    <p><?php echo $product_name; ?></p>
                </div>
                
                <h2><?php echo "$" . $product_price; ?></h2>
                <h2>In Stock: 0</h2>

                <div class="add-to-cart">
                    <div class="amount-in-cart">
                        <button>-</button>
                        0
                        <button>+</button>
                    </div>
                    <button>Add to Cart</button>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Put Footer Below This -->
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>
</html>