<?php
session_start();
require_once('./php/component.php');
require_once('./connection.php');
require_once('./php/cartFunction.php');
$database = DBConnection::get_instance();
$product_id = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
                    echo '<li style="float:right"><a class=class="button-header"href="./logout.php">Log Out</a></li>';
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
            <button onclick="history.back()" class="backButton">&#8592;</button>
            <?php
            if (isset($_COOKIE["shopping_cart"])) {
                $quantity = 0;
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach ($cart_data as $keys => $values) {
                    $quantity += $values["product_quantity"];
                }
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\">check out [$quantity]</a>";
            } else {
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\">check out [0]</a>";
            }

            ?>
        </div>

        <div class='itemDiv'>
            <div class="itemPic">
                <div class="picContain">
                    <img src="./image/image1 copy.png" alt="">
                </div>
            </div>
            <div class="itemText">
                <h1>"Air Jordan 1 Blue"</h1>
                <h3>Dark Marina Blue</h3>
                <hr>
                <h1>Product Detail</h1>
                <p>The Air Jordan 1 High Dark Marina Blue arrives with a smooth black leather upper with Dark Marina Blue overlays and Swooshes. On the ankle wrap, a black Jordan Wings logo pays homage to the origins of the Air Jordan 1. From there, a contrasting white and blue Air sole completes the design.
                The Air Jordan 1 High Dark Marina Blue releases in February of 2022.</p>
                <h3>Date Added:10/20/2021</h3>
                <h1>Price: $300 </h1>
                <div class="quantity">
                    <h1>Quantitiy: </h1>
                    <div class="counter">
                        <button class="minus">-</button>
                        <input type="number" id="number" class="num" value='0' min='0'>
                        <button class="add">+</button>
                    </div>
                </div>
                <hr>
                <button class="button2">Add to Cart</button>
            </div>
        </div>
    </div>

</body>
<footer>
    <div style="color:white;">
        Shopster &copy; 2022
    </div>
</footer>
<script>
    $(document).ready(function() {

        $(".add").click(function() {
            document.getElementById('number').value++;
        });

        $(".minus").click(function() {
            if (document.getElementById('number').value > 0)
                document.getElementById('number').value--;
        });

    });
</script>

</html>