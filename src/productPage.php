<?php
session_start();
require_once('./php/component.php');
require_once('./connection.php');
$database = DBConnection::get_instance();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | main</title>
    <link href="./style/main.css" rel="stylesheet">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
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
                    echo '<li style="float:right"><a class="active" href="./logout.php">Log Out</a></li>';
                    echo "<li style='margin:center'><a class='userHello'>Hello, " . $_SESSION['username'] . "</i></a></li>";
                } else {
                    echo '<li style="float:right"><a class="active" href="./loginPage.php">Log In</i></a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="todayDeal">
        <div class="checkoutCon">
        <?php
            if(isset($_COOKIE["shopping_cart"]))
			{
				$quantity = 0;
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values){
                    $quantity += $values["product_quantity"];

                }
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\">check out [$quantity]</a>";
            }
            else{
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\">check out [0]</a>";
            }

            ?>
        </div>
        <div class="todayHeader">
            <p>- PRODUCTS -</p>
        </div>
        <div class="catDropDown">
            <form action="">
            <div class="filter">
            <label for="">Category:</label>
            <select id="category_list" name="categoryID">
                   <option value="ALL" default>ALL</option>
                   <option value="Sneaker">Sneaker</option>
                   <option value="T-Shrit">T-Shrit</option>
                   <option value="Accessory">Accessory</option>
            </select>
            </div>
            <div class="filter">
            <label for="">Sort By:</label>
            <select id="category_list" name="categoryID">
                   <option disabled selected value> ---- </option>
                   <option value="Sneaker">Newest</option>
                   <option value="T-Shrit">Price (High to Low)</option>
                   <option value="Accessory">Price (Low to High)</option>
            </select>
            </div>
            <div class="filterSubmitt">
                <button type="submit">SUBMITT</button>
            </div>
            </form>
        </div>
    

        <div class="itemDisplayContainer">
                <?php
                $result = $database->getAllItem();
                while ($row = mysqli_fetch_assoc($result)) {
                    displayAllProduct($row['product_name'], $row['price'], $row['image'], $row['product_id'],$row['special']);
                }
                ?>
        </div>
    </div>

</body>
<footer>
    <div style="color:white;">
        Shopster &copy; 2022
    </div>
</footer>

</html>