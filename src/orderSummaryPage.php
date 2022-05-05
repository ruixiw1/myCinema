<?php
session_start();                      // Resumes session of user's cookie, this is keeping track of the user's cart details. 
include_once('connection.php');       // Includes/imports the connection.php file, if code has already been included, will not be included again.
require_once('./php/component.php');  // Includes/imports the component.php file, if that file has

if (isset($_POST["checkOut"])) {                   // If the checkOut form is not null/empty.   
  if (isset($_COOKIE['shopping_cart'])) {          // If the shopping_cart  cookie is not null/empty. 
    unset($_COOKIE['shopping_cart']);              // Deletes the variable where the value of this cookie is stored. 
    setcookie('shopping_cart', '', time() - 3600); // Essentially deletes the cookies by setting the expiration date in the past. 
  }
}
?>

<!DOCTYPE html>   

<html lang="en" class="background"> <!-- Sets the html language to English | Sets the class to 'background' for the moving trees and mountains effect  --> 
<head>
  <!-- Scaling and Compatiblity   --> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Page Title & Favicon  --> 
  <title>Shopster | Summary</title>
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  
  <!-- Style Sheets  --> 
  <link href="./style/main.css" rel="stylesheet">
  <link href="./style/misc-style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
  <link href="./style/checkout.css" rel="stylesheet">
  <link href="./style/cart.css" rel="stylesheet">
  <link href="./style/orderSummary.css" rel="stylesheet">
</head>




<body onload="setData()"> 
  
<script> // Function takes the information from submitForm() & turns from local storage to Elements 
       function setData(){
        if(typeof(localStorage) != "undefined"){
            document.getElementById("displayName").innerHTML = localStorage.name;
            document.getElementById("displayAddress").innerHTML = localStorage.address;
            document.getElementById("displayCity").innerHTML = localStorage.city;
            document.getElementById("displayState").innerHTML = localStorage.state;
            document.getElementById("displayZip").innerHTML = localStorage.zip;
            document.getElementById("displayNameCC").innerHTML = localStorage.nameCC;
            document.getElementById("displayCardNumber").innerHTML = localStorage.cardNumber;
            document.getElementById("displayCardCVV").innerHTML = localStorage.cardCVV;
            document.getElementById("displayExpMonth").innerHTML = localStorage.expMonth;
            document.getElementById("displayExpYear").innerHTML = localStorage.expYear;
       }
      }
    </script>
    

  <nav> <!-- Navigation Bar  -->
     <a href="index.php"> <h1 class="logo">shopster.</h1> </a>                     <!-- Shopster logo and link back to homepage when clicked -->
     <div class="navbar" id="navbarNavAltMarkup">                   
       <ul>  <!-- List -->                                                    
         <li><a class="button-header" href="./index.php"><i>home</a></li>          <!-- Index   Page -->
         <li><a class="button-header" href="./productPage.php">products</a></li>   <!-- Product Page -->
         <li><a class="button-header" href="./aboutPage.php">about</a></li>        <!-- About   Page -->
         
         <?php
           if (isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {                                      // If the there is a user, and the user is logged in ... 
             echo '<li style="float:right"><a class="button-header" href="./logout.php">Log Out</a></li>';            // Display the logout button 
             echo "<li style='margin:center'><a class='userHello'>Hello, " . $_SESSION['username'] . "</i></a></li>"; // Display "Hello , <USERNAME>" 
           } else {                                                                                                   // Otherwise ...  
             echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';      // Display the login button 
           }
         ?>
       </ul>
     </div>
  </nav>
  
  <div class="todayHeader">
   <h3>- Order Summary -</h3>                             <!-- Page Header  -->
  </div>
   <div class="row">       
     <div class="col-50">
       <div class="container"> 
            <div class="row">
               <div class="col-502">
                 <h3>Shipping Address</h3>                <!-- Shipping Information -->                  

                 <div class = "row2" > 
                 <p><b>Name: </b></p>                     <!-- Name -->
                 <p id="displayName" > </p>     
                     </div>
                     <div class = "row2" > 
                        <p><b>Address: </b></p>           <!-- Address -->
                         <p id="displayAddress" > </p>  
                    </div> 
                    <div class = "row2" > 
                        <p><b>City & State : </b></p>

                        <p id="displayCity"> </p>         <!-- City -->
                        <p>, </p>
                        <p id="displayState"> </p>        <!-- State -->
                        <p>  </p>
                        <p id="displayZip"> </p>          <!-- Zip -->
                    </div> 
             </div>
          <div class="col-502">
            <h3>Payment Information</h3>      <!-- Payment Information -->           
            <div class = "row2" > 
            <p><b>Card Name: </b></p>         <!-- Card Name -->
            <p id="displayNameCC" > </p>     
            </div>
            <div class = "row2"> 
            <p><b>Card Number: </b></p>       <!-- Card Number -->
            <p id="displayCardNumber"> </p> 
            </div> 
            <div class = "row2"> 
            <p><b>Expiration Date:   </b></p> <!-- Expiration Date -->
            <p id="displayExpMonth"> </p>     <!-- Month  -->
            <p> / </p>    
            <p id="displayExpYear"> </p>      <!-- Year  -->
            <p><b>   CVV: </b></p>            <!-- Card CCV -->
            <p id="displayCardCVV"> </p>     
        </div> 
          </div>
        </div>
        <a href= "./php/paymentSuccess.php"> 
        <input type="button" value="COMPLETE CHECKOUT" class="btn" >       <!-- Checkout button sends user to  paymentSuccesful page -->
          </a> 
        </div>
  </div>


  <?php 
  if (isset($_COOKIE["shopping_cart"])) {                                   // If the shopping cart is not null/empty. 
     $quantity = 0;
     $total = 0;
     $cookie_data = stripslashes($_COOKIE['shopping_cart']);               // Get the shopping_cart cookie's information
     $cart_data = json_decode($cookie_data, true);                         // Decode the cookie's JSON
     foreach ($cart_data as $keys => $values) {                            // For every object in the cart 
         $quantity += $values["product_quantity"];                         // Add its amount of items to the total quantity. 
         $total += $values["product_price"] * $values["product_quantity"]; // Add the respected price (price * quantity) to the price total. 
     }                                                                     // These variables will be used for displaying the checkout information 
  } 
  ?>

  <div class="col-25">
    <div class="checkoutContainer">
       <h4>CHECKOUT DETAILS<hr></h4> <!-- Checkout Box  -->
        <?php
           if (isset($_COOKIE["shopping_cart"])) {                    // If the shopping cart is not null/empty.
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);  // Get the shopping_cart cookie's information
            $cart_data = json_decode($cookie_data, true);            // Decode the cookie's JSON 
            foreach ($cart_data as $keys => $values) {               // For every object in the cart , pass it's values into displayCheckOutItem
             displayCheckOutItem($values['product_id'], $values['product_name'], $values['product_price'], $values['product_quantity'],$values['product_image']);                                                
             }
           }
         ?> 
       <h3>Total :
        <?php
         if (isset($_COOKIE["shopping_cart"])) { // If the shopping cart is not null/empty.
           echo "$$total";                        // Display the total number of items in the cart. 
          } else {                                // Otherwise...   
            echo '0';                              // Display a 0.
          }  
         ?>   
       </h3>
     </div> 
    </div>
<footer> <!-- Footer  -->
    Shopster &copy; 2022
</footer>

</html> 
