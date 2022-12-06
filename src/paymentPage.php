<?php
require_once('./php/component.php');
require_once('connection.php');
require_once('./sendMail.php');
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
//Product of a category
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycinema | payment</title>
    <link rel="stylesheet" href="./style/checkout.css">
    <link rel="stylesheet" href="./assets/cart.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/main.css">
    <style>
        .btn_div {
            display: flex;
            justify-content: center;
        }

        label,
        p {
            color: white;
        }
    </style>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            $username = $_SESSION['username'];
            $movienametemp = $values["movie_name"];
            $theatretemp = $values["theatre"];
            $typetemp = $values["type"];
            $datetemp = $values["movie_date"];
            $timetemp = $values["showtime"];
            $quantitytemp = $values["quantity"];
            $isPayed = 1;
            $query = "INSERT INTO bookingtable (username, moviename, theatre, type, bookingDate, showtime, quantity, hasPayed) 
                VALUES ('$username', '$movienametemp', '$theatretemp', '$typetemp', '$datetemp', '$timetemp', '$quantitytemp', '$isPayed');";
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
            if (isset($_COOKIE['shopping_cart'])) {
                setcookie('shopping_cart', '', time() - 3600, '/');
                setcookie('order_detail', '', time() - 3600, '/');
            }
            $orderMessage = $movienametemp." ".$typetemp."*".$quantitytemp." on ".$datetemp." ".$theatretemp."<br/>"."Total: $".$_COOKIE['order_detail'];
            $recipient = htmlspecialchars($_SESSION['email']);
            sendOrderConfirmation($recipient,$orderMessage);
            header("Location: ./static/paymentSuccess.html");
        }
    }
}

?>

<body>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form id="form" method="POST">
                    <!-- Shipping & Payment Form -->
                    <div class="row">
                        <div class="col-50">
                            <h3>Enter Payment Info</h3>

                            <label for="fname"><i class="fa fa-user"></i> Full Name</label> <!-- Name | fa fa-user is the tiny person icon -->
                            <input type="text" id="fname" name="firstname" placeholder="full name" required>

                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label> <!-- Address | fa fa-address-card-o is the tiny ID card icon -->
                            <input type="text" id="adr" name="address" placeholder="address" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label> <!-- City | fa fa-institution is the tiny townhall icon -->
                            <input type="text" id="city" name="city" placeholder="city" required>
                            <div class="row">
                                <!-- Seperated into a new section for better organization -->
                                <div class="col-50">
                                    <label for="state">State</label> <!-- State -->
                                    <input type="text" id="state" name="state" placeholder="state" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label> <!-- Zip -->
                                    <input type="text" id="zip" name="zip" placeholder="zip" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <h3>&nbsp;</h3>
                            <label for="cname">Name on Card</label> <!-- Name -->
                            <input type="text" id="cname" name="cardname" placeholder="name" required>
                            <label for="ccnum">Credit card number</label> <!-- Number -->
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                            <label for="cvv">CVV</label> <!-- CCV -->
                            <input type="text" id="cvv" name="cvv" placeholder="cvv" required>
                            <div class="row">
                                <!-- Seperated into a new section for better organization -->
                                <div class="col-50">
                                    <label for="expmonth">Exp Month</label> <!-- Expiration Month  -->
                                    <input type="text" id="expmonth" name="expmonth" placeholder="Exp month" required>
                                </div>

                                <div class="col-50">
                                    <label for="expyear">Exp Year</label> <!-- Expiration Year  -->
                                    <input type="text" id="expyear" name="expyear" placeholder="year" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn_div">
                        <input type="submit" value="Submit Payment" class="btn">

                    </div>

                </form>

            </div>

        </div>
        <div class="orderSummary">
            <h2>Order Summary:</h2>
            <hr />

            <?php
            if (isset($_COOKIE["shopping_cart"])) {

                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach ($cart_data as $keys => $values) {
                    printOrderSummary($values['movie_name'], $values['quantity']);
                }
            }
            echo "<hr/>";
            echo "<h2>Total: $ " . $_COOKIE['order_detail'] . "</h2>";
            ?>
        </div>

    </div>

</body>

</html>