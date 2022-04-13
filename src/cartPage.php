<?php
    if(isset($_POST["checkOut"])){

    if(isset($_COOKIE['shopping_cart'])){
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
                    echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                }

                ?>
            </ul>
        </div>
    </nav>
            <!-- test cookie content add unset -->
    <?php
            if(isset($_COOKIE["shopping_cart"]))
			{
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values){
                   echo "<p>$values[product_name], $values[product_price],$values[product_quantity], $values[product_image]</p>";
                }
            }
            else{
                echo "<a class=\"checkoutButt\" href=\"./cartPage.php\">check out [0]</a>";
            }

    ?>
    <form action="" method="post">
    <button name="checkOut" type="submit" >clear cookie</button>
    </form>

</body>
</html>