<?php
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | cart</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="./style/cart.css" rel="stylesheet">
</head>

<body class="todayDeal">
    <nav>
        <a href="index.php"><span>
                <h1 class="logo">shopster.</h1>
            </span></a>
        <div class="navbar">
            <ul>
                <li><a class="button-header" href="./index.php"><i>home</a></li>
                <li><a class="button-header" href="./productPage.php">products</a></li>
                <li><a class="button-header" href="./aboutPage.php">about</a></li>
                <?php
                if (isset($_COOKIE['logged_in']) && $_COOKIE["logged_in"] = true) {
                    echo '<li style="float:right"><a class="active" href="./logout.php">Log Out</a></li>';
                    echo "<li style='margin:center'><a class='userHello'>Hello, " . $_COOKIE['username'] . "</i></a></li>";
                } else {
                    echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                }

                ?>
            </ul>
        </div>
    </nav>
    <div class="checkoutCon">
        <button onclick="history.back()" class="backButton">&#8592;</button>
        <div class="todayHeader">
            <p>- Cart -</p>
        </div>
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


    <div class="mainContainer">
        <div class="itemsContainer">

            <?php

            $total = 0;
            // if (isset($_COOKIE['shopping_cart'])) {
            //     if (isset($_COOKIE["shopping_cart"])) {
            //         $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            //         $cart_data = json_decode($cookie_data, true);
            //         foreach ($cart_data as $keys => $values) {
            //             echo " <div class=\"items\">
            //                     <p>$values[product_name], $values[product_price],$values[product_quantity], $values[product_image]</p>
            //                     </div>    
            //                 ";
            //         }
            //     }
            // } else {
            //     echo "<h5>Cart is Empty</h5>";
            // }

            ?>
            <div class='cartItem'>
                <div class="cartItemPic">
                    <div class="cartPicWrap">
                        <img src="./image/image1 copy.png" alt="">
                    </div>
                </div>
                <div class="itemText">
                    <p>"Air Jordan 1 Blue"</p>
                    <p>Price: 300 </p>
                    <div class="quantity">
                        <p>Quantitiy: </p>
                        <div class="counter">
                            <button class="minus">-</button>
                            <input type="number" id="number" class="num" value='0' min='0'>
                            <button class="add">+</button>
                        </div>
                    </div>
                    <div class="cartButtonDiv">
                        <button>Update</button>
                        <button>Remove</button>
                    </div>
                </div>

            </div>
            <div class='cartItem'>
                <div class="cartItemPic">
                    <div class="cartPicWrap">
                        <img src="./image/image1 copy.png" alt="">
                    </div>
                </div>
                <div class="itemText">
                    <p>"Air Jordan 1 Blue"</p>
                    <p>Price: 300 </p>
                    <div class="quantity">
                        <p>Quantitiy: </p>
                        <div class="counter">
                            <button class="minus">-</button>
                            <input type="number" id="number" class="num" value='0' min='0'>
                            <button class="add">+</button>
                        </div>
                    </div>
                    <div>
                        <button>Update</button>
                        <button>Remove</button>
                    </div>
                </div>

            </div>
            <div class='cartItem'>
                <div class="cartItemPic">
                    <div class="cartPicWrap">
                        <img src="./image/image1 copy.png" alt="">
                    </div>
                </div>
                <div class="itemText">
                    <p>"Air Jordan 1 Blue"</p>
                    <p>Price: 300 </p>
                    <div class="quantity">
                        <p>Quantitiy: </p>
                        <div class="counter">
                            <button class="minus">-</button>
                            <input type="number" id="number" class="num" value='0' min='0'>
                            <button class="add">+</button>
                        </div>
                    </div>
                    <div>
                        <button>Update</button>
                        <button>Remove</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="orderDetail">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="pricDetails">
                <div class="col-md-6">
                    <?php
                    if (isset($_COOKIE['cart'])) {
                        $count  = count($_COOKIE['cart']);
                        echo "<h6>Price ($count items)</h6>";
                    } else {
                        echo "<h6>Price (0 items)</h6>";
                    }
                    ?>
                    <h6>Amount Payable</h6>
                </div>
                <div class="col-md-6">
                    <h6>$<?php echo $total; ?></h6>
                    <h6 class="text-success">FREE</h6>
                    <hr>
                    <h6>$<?php
                            echo $total;
                            ?></h6>
                </div>


            </div>
        </div>
    </div>
    <?php
    if (isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            echo "<p>$values[product_name], $values[product_price],$values[product_quantity], $values[product_image]</p>";
        }
    }

    ?>
    <form action="" method="post">
        <button name="checkOut" type="submit">clear cookie</button>
    </form>

</body>

</html>