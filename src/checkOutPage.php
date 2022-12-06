<?php
require_once("./php/component.php");
require_once("./php/cartFunction.php");
session_start();
try {
    $dsn = 'mysql:host=localhost;dbname=mycinema';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycinema | checkout</title>
    <link rel="stylesheet" href="./assets/cart.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['code'])) {
            $code = $_POST['code'];
            $promotionQuery = "SELECT * FROM promotion  WHERE `Code` = '" . $code ."' ";
            $statement = $db->prepare($promotionQuery);
            $statement->execute();
            $result = $statement->fetchAll();
            if(count($result)<1){
                $err = "please enter valid code";
            }
            else{
                $err = "code applied";
                $promotionPercent = $result[0]["Percent"];
            }
        }
        else{
            $err = "please enter valid code";
        }
    }

?>
<body>
<header class="">
            <div class="navbar">


                <button class="navbar-menu-btn">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

                <nav class="">
                    <ul class="navbar-nav">

                        <li> <a href="./index.php" class="navbar-link">Home</a> </li>
                        <?php
                        if(isset($_SESSION['admin']) && $_SESSION["admin"] = true){
                            echo "<li style='margin:center'><a href='./adminMain.php' class='userHello'>Admin</i></a></li>";

                        }
                        else if(isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
                            echo "<li style='margin:center'><a href='./editProfile.php' class='userHello'>Hello, " . $_SESSION['username'] . "</i></a></li>";
                        }
                        ?>
                    </ul>

                </nav>

                <div class="navbar-actions">

                    <form action="#" class="navbar-form">
                        <input type="text" name="search" placeholder="I'm looking for..." class="navbar-form-search">

                        <button class="navbar-form-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>

                        <button class="navbar-form-close">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </button>
                    </form>

                    <button class="navbar-search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>

                    <a href="./login.html" class="navbar-signin">
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
                            echo '<li style="float:right"><a class="button-header" href="./logout.php">Log Out</a></li>';
                        } else {
                            echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                        }
                        ?>
                        <ion-icon name="log-in-outline"></ion-icon>
                    </a>


                </div>

            </div>
        </header>
<div class="mainContainer">
            <div class="itemsContainer">
                

                <?php
                if (isset($_COOKIE["shopping_cart"])) {
                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                    $cart_data = json_decode($cookie_data, true);
                    foreach ($cart_data as $keys => $values) {
                        displayCartItem($values['movie_id'], $values['movie_name'], $values['movie_price'], $values['quantity'], $values['movie_image'], $values['movie_date'],$values['showtime'],$values['theatre'],$values['type']);
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
                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);
                            foreach ($cart_data as $keys => $values) {
                                $quantity += $values["quantity"];
                                $total += $values["movie_price"] * $values["quantity"];
                            }
                            if(isset($promotionPercent)){
                                $total -= $total * $promotionPercent;

                            }
                            setcookie('order_detail', $total, time() + (86400 * 30), '/');
                            echo "<h3>Tickets: ($quantity)</h3>";
                        } else {
                            echo "<h3>Tickets: (0)</h3>";
                        }
                        ?>
                        
                        <h3>Total Amount:$
                            <?php
                            if (isset($_COOKIE["shopping_cart"])) {
                                echo "$total";
                            } else {
                                echo '0';
                            } ?>
                        </h3>
                        <form method="post">
                        <label>Promotion Code:</label>
                        <input type='text' name='code'>
                        <?php
                        if (!empty($err)) {
                            echo '<div style="text-align:center">' . $err . '</div>';
                        } else {
                            echo '<br>';
                        }
                        ?>
                        <button class='checkOutButton' type="submit">
                           <h3> apply</h3>
                        </button>

                        </form>
                    </div>

                    <div class="col-md-6">
                        <hr>
                        <?php
                        $des;
                        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)
                            $des = '"./paymentPage.php"';
                        else
                            $des = '"./loginPage.php"';
                        ?>
                        <form action=<?php echo $des; ?>>
                            <button class='checkOutButton' type="submit">
                                <h2>Check Out</h2>
                            </button>
                    </div>


                </div>
            </div>
        </div>
    </body>

</html>