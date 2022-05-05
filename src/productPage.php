<?php
//session_start
session_start();
//include classes
require_once('./php/component.php');
require_once('./connection.php');
require_once('./php/cartFunction.php');
//get DB connection instance
$database = DBConnection::get_instance();
//recieve passed informtion
$category_id = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
$sort_id = filter_input(INPUT_GET, 'sortID', FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | Products</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="index.php"><span>
                <h1 class="logo">shopster.</h1>
            </span></a>
        <div class="navbar" id="navbarNavAltMarkup">
            <ul>
                <li><a class="button-header" href="./index.php"><i>home</a></li>
                <li><a class="button-header" href="./productPage.php">products</a></li>
                <li><a class="button-header" href="./aboutPage.php">about</a></li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
                    echo '<li style="float:right"><a class="button-header" href="./logout.php">Log Out</a></li>';
                    echo "<li style='margin:center'><a class='userHello'>Hello, " . $_SESSION['username'] . "</i></a></li>";
                } else {
                    echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="todayDeal">

        <div class="checkoutCon">
            <div></div>
            <?php
            //display cart button by reading the cookie_data
            if (isset($_COOKIE["shopping_cart"])) {
                $quantity = 0;
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach ($cart_data as $keys => $values) {
                    $quantity += $values["product_quantity"];
                }
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\"><i class=\"fa fa-shopping-cart\" style=\"font-size:24px\"></i>Cart[$quantity]</a>";
            } else {
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\"><i class=\"fa fa-shopping-cart\" style=\"font-size:24px\"></i>Cart[0]</a>";
            }

            ?>
        </div>
        <div class="todayHeader">
            <h3>- PRODUCTS -</h3>
        </div>
        <div class="productMain">
        <div class="itemDisplayContainer">
            <?php
            $result;
            //when no filter is set call getAllItem to get all products
            if (($category_id == NULL || $category_id ==  FALSE) && ($sort_id == NULL || $sort_id ==  FALSE)) {
                $result = $database->getAllItem();
            } else {
                //otherwise execute getItemFilter to return products respectively
                $result = $database->getItemFilter($category_id, $sort_id);
            }
            //call displayAllproduct to generate DOM element
            while ($row = mysqli_fetch_assoc($result)) {
                displayAllProduct($row['product_name'], $row['price'], $row['image'], $row['product_id'], $row['special']);
            }
            ?>
        </div>
        <div class="catDropDown">
            <form action="">
                <!-- filter section -->
                <div class="filter">
                    <label for="">Category:</label>
                    <select id="category_list" name="categoryID">
                        <option value="0" default>ALL</option>
                        <option value="1" <?php if (isset($category_id) && $category_id == 1) echo "selected='selected'"; ?>>Sneaker</option>
                        <option value="2" <?php if (isset($category_id) && $category_id == 2) echo "selected='selected'"; ?>>T-Shirt</option>
                        <option value="3" <?php if (isset($category_id) && $category_id == 3) echo "selected='selected'"; ?>>Accessory</option>
                    </select>
                </div>
                <div class="filter">
                    <label for="">Sort By:</label>
                    <select id="category_list" name="sortID">
                        <option> ---- </option>
                        <option value="1" <?php if (isset($sort_id) && $sort_id == 1) echo "selected='selected'" ?>>Newest</option>
                        <option value="2" <?php if (isset($sort_id) && $sort_id == 2) echo "selected='selected'" ?>>Price (High to Low)</option>
                        <option value="3" <?php if (isset($sort_id) && $sort_id == 3) echo "selected='selected'" ?>>Price (Low to High)</option>
                    </select>
                </div>
                <div class="filterSubmitt">
                    <button type="submit">SUBMIT</button>
                </div>
            </form>
        </div>
        </div>

        <footer>
            Shopster &copy; 2022
        </footer>
    </div>

</body>


</html>