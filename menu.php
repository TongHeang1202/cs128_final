<?php 
    // Connect to database
    include("layout/connectDB.php");
    // selecting category table
    $tbl_category = "SELECT * FROM `tbl_category`";
    $q_category = mysqli_query($connection, $tbl_category);
    // selecting product table
    $tbl_product = "SELECT * FROM `tbl_product`";
    $q_product = mysqli_query($connection, $tbl_product);
    // if category not real, DIE
    if (!isset($_GET["category"])){
        die("This page does not exist");
    }
    // get the category number
    $selected_category = $_GET["category"];
    $category_id = 0;
    // check if category is real
    $not_valid_category = true;
    while($category_list = mysqli_fetch_assoc($q_category)){
        if ($selected_category == $category_list["category_name"]){
            $not_valid_category = false;
            $category_id = $category_list["category_id"];
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

</head>
<body>
    <!-- Open Navigation Bar Container -->
    <?php include("layout/header.php") ?>
    <!-- Close Navigation Bar Container -->

    <div class="container1">
        <img class="container-background" src="images/frontpage_images/showcase-banner-background.jpg">
        <h1 class="container-title"><?php echo strtoupper($_GET["category"])?></h1>

        <div class="product-showcase-container">
            <!-- open php -->
            <?php 

            while ($product = mysqli_fetch_assoc($q_product)){
            ?>
                <?php
                // checks if item is in category
                if ($product["category_id"] != $category_id){
                    continue;
                }
                //if item in category, display the items
                $product_id = $product["product_id"];
                ?>
                <a class="product-showcase" href="<?php echo "product.php?id=" . $product["product_id"]; ?>">
                    <div class="product-showcase-name"><?php echo $product["product_name"]; ?></div>
                    <img class="product-showcase-image" src="<?php echo $product["product_image"]; ?>">
                    <div class="product-showcase-tag">
                        <span><?php echo "$" . $product["product_price"]; ?></span>
                    </div>
                </a>
            <?php
            }
            
            ?>
            <!-- close php -->
        </div>

    </div>
    
    <!-- Put Footer Below This -->
    <?php include("layout/footer.php") ?>
    <!-- Footer End -->
</body>
</html>