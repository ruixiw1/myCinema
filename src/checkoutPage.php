<?php
session_start();
include_once('connection.php');
require_once('./php/component.php');
require_once('./php/cartFunction.php');

if (isset($_POST["checkOut"])) {

  if (isset($_COOKIE['shopping_cart'])) {
    unset($_COOKIE['shopping_cart']);
    setcookie('shopping_cart', '', time() - 3600);
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="background">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopster | CheckOut</title>
  <link href="./style/main.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link href="./style/misc-style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
  <link href="./style/checkout.css" rel="stylesheet">
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

  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="/action_page.php">

          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="New York">

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="NY">

                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
              </div>
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards:</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="John More Doe">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>

          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container">


        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>


        <p><a href="#">Integrate</a> <span class="price">$15</span></p>
        <p><a href="#">the cart functionality</a> <span class="price">$5</span></p>
        <p><a href="#">into here</a> <span class="price">$8</span></p>
        <p><a href="#">lmao</a> <span class="price">$2</span></p>

        <hr>
        <hr>

        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>




      </div>
    </div>
  </div>

</body>


<footer>
  <div style="color:white;">
    Shopster &copy; 2022
  </div>
</footer>


</html>