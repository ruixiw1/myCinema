<?php
//include classes
session_start();
require_once('./php/component.php');
require_once('./connection.php');
require_once('./php/cartFunction.php');
if (isset($_POST["checkOut"])) {

    if (isset($_COOKIE['shopping_cart'])) {
        unset($_COOKIE['shopping_cart']);
        setcookie('shopping_cart', '', time() - 3600);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- dependency -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | Cart </title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
    <link href="./style/cart.css" rel="stylesheet">
    <script>
        function minusCheck(id) {
            var ele = document.getElementById(id);
            if (ele.value > 0) {
                ele.value--;
            }
        }
    </script>
</head>

<body>
    <nav>
        <a href="index.php">
            <h1 class="logo">shopster.</h1>
        </a>
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
            <button onclick="history.back()" class="backButton"><i class="fa-solid fa-arrow-left-long"></i></button>
            <div class="todayHeader">
                <h3>- Cart -</h3>
            </div>
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


        <div class="mainContainer">
            <div class="itemsContainer">


                <?php
                if (isset($_COOKIE["shopping_cart"])) {
                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                    $cart_data = json_decode($cookie_data, true);
                    foreach ($cart_data as $keys => $values) {
                        displayCartItem($values['product_id'], $values['product_name'], $values['product_price'], $values['product_quantity'], $values['product_image'], $values['special']);
                    }
                }
                else{
                    echo "<h1 style=\"text-align:center\">Cart is Empty</h1>";
                }

                ?>

            </div>

            <div class="orderDetail">
                <h1>ORDER DETAILS</h1>
                <hr>
                <div class="pricDetails">
                    <div class="col-md-6">
                        <?php
                        if (isset($_COOKIE["shopping_cart"])) {
                            $quantity = 0;
                            $total = 0;
                            $totalSaved = 0;
                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);
                            foreach ($cart_data as $keys => $values) {
                                $quantity += $values["product_quantity"];
                                $total += $values["product_price"] * $values["product_quantity"];
                                if ($values["special"] == 1) {
                                    $totalSaved += $values["product_quantity"] * 50;
                                }
                            }
                            echo "<h3>Items: ($quantity)</h3>";
                        } else {
                            echo "<h3>Items: (0)</h3>";
                        }
                        ?>
                        <h3>
                            Total Saved:$<?php
                                            if (isset($_COOKIE["shopping_cart"])) {
                                                echo "$totalSaved";
                                            } else {
                                                echo '0';
                                            } ?>
                        </h3>
                        <h3>Total Amount:$
                            <?php
                            if (isset($_COOKIE["shopping_cart"])) {
                                echo "$total";
                            } else {
                                echo '0';
                            } ?>
                        </h3>
                    </div>

                    <div class="col-md-6">
                        <hr>
                        <?php
                        $des;
                        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)
                            $des = '"./checkoutPage.php"';
                        else
                            $des = '"./loginPageCheckOut.php"';
                        ?>
                        <form action=<?php echo $des; ?>>
                            <button class='checkOutButton' type="submit">
                                <h2>Check Out</h2>
                            </button>
                    </div>


                </div>
            </div>
        </div>
        <footer>
            Shopster &copy; 2022
        </footer>
    </div>
</body>


</html>