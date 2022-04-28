<?php
//include class
session_start();
require_once('./php/component.php');
require_once('./connection.php');
require_once('./php/cartFunction.php');
$database = DBConnection::get_instance();
$numberOfSpecial = 0; //number Special items
$result = $database->getSpecialItem();
while ($row = mysqli_fetch_assoc($result)) {
    $numberOfSpecial++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- dependency -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | Home</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/main.css" rel="stylesheet">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/scroll.css">
    <style>
        @keyframes bannermove {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-50%, 0);
            }
        }

        .scrollContainer{
            animation: bannermove <?php echo $numberOfSpecial * 10; ?>s linear infinite;
        }

        .scrollContainer:hover {
            animation-play-state: paused;
        }
    </style>
</head>

<body class="todayDeal">
    <nav>
        <a href="index.php"><span>
                <h1 class="logo">shopster.</h1>
            </span></a>
        <div class="navbar" id="navbarNavAltMarkup">
            <ul>
                <li><a class="button-header" href="./index.php"><i>home</a></li>
                <li><a class="button-header" href="./productPage.php">products</a></li>
                <li><a class="button-header" href="./aboutPage.php">about</a></li>
                <!-- if statement to generate nav bar elememnt by login status -->
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
    <div>
        <div class="checkoutCon">
            <div></div>
            <!-- dynamically shows number of item in cart -->
            <?php
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
            <h3>TODAY'S DEALS</h3>
        </div>
        <div class="itemDisplayContainer">
            <!-- get special items by running query on the dasebase an call function to generate as DOM element and set speed of animation by number of items-->
            <div class="scrollContainer">
                <?php
                $result = $database->getSpecialItem();
                while ($row = mysqli_fetch_assoc($result)) {
                    displaySpecialProduct($row['product_name'], $row['price'], $row['image'], $row['product_id']);
                }
                ?>
                <?php
                $result = $database->getSpecialItem();
                while ($row = mysqli_fetch_assoc($result)) {
                    displaySpecialProduct($row['product_name'], $row['price'], $row['image'], $row['product_id']);
                }
                //   In case that dont have enough to special items to maintain scolling display continuously
                if ($numberOfSpecial <= 3) {
                    $extra1 = $database->getSpecialItem();
                    $extra2 = $database->getSpecialItem();
                    while ($row = mysqli_fetch_assoc($extra1)) {
                        displaySpecialProduct($row['product_name'], $row['price'], $row['image'], $row['product_id']);
                    }
                    while ($row = mysqli_fetch_assoc($extra2)) {
                        displaySpecialProduct($row['product_name'], $row['price'], $row['image'], $row['product_id']);
                    }
                }
                ?>
            </div>
        </div>
        <footer>
            Shopster &copy; 2022
        </footer>
    </div>
</body>

</html>