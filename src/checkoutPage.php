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
  <title>Shopster | CheckOut</title>
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  
  <!-- Style Sheets  --> 
  <link href="./style/main.css" rel="stylesheet">
  <link href="./style/misc-style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
  <link href="./style/checkout.css" rel="stylesheet">
</head>




<body> 
  
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
   <h3>- CHECKOUT -</h3>  <!-- Page Header  -->
  </div>




  <div class="row">       
     <div class="col-75">
       <div class="container"> 
         <form id = "form" action="orderSummaryPage.php" onsubmit="submitForm()" method="POST"> <!-- Shipping & Payment Form -->
            <div class="row">
               <div class="col-50">
                 <h3>Shipping Address</h3>                                               <!-- Shipping Information --> 
                
                
                 <label for="fname"><i class="fa fa-user"></i> Full Name</label>         <!-- Name | fa fa-user is the tiny person icon -->
                 <input type="text" id="fname" name="firstname" placeholder="full name" required>

                 <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>   <!-- Address | fa fa-address-card-o is the tiny ID card icon -->
                 <input type="text" id="adr" name="address" placeholder="address" required>
                 <label for="city"><i class="fa fa-institution"></i> City</label>        <!-- City | fa fa-institution is the tiny townhall icon -->
                 <input type="text" id="city" name="city" placeholder="city" required>
                 <div class="row">                                                       <!-- Seperated into a new section for better organization -->
                    <div class="col-50">
                     <label for="state">State</label>                                    <!-- State -->
                     <input type="text" id="state" name="state" placeholder="state" required>
                    </div>
                   <div class="col-50">
                     <label for="zip">Zip</label>                                          <!-- Zip -->
                     <input type="text" id="zip" name="zip" placeholder="zip" required>
                   </div>  
                  </div>
             </div>
          <div class="col-50">
            <h3>Payment</h3>                                                                 <!-- Payment Information -->
            <label for="cname">Name on Card</label>                                          <!-- Name -->
            <input type="text" id="cname" name="cardname" placeholder="name" required>
            <label for="ccnum">Credit card number</label>                                    <!-- Number -->
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="cvv">CVV</label>                                                     <!-- CCV -->
            <input type="text" id="cvv" name="cvv" placeholder="cvv" required>
            <div class="row">                                                                <!-- Seperated into a new section for better organization -->
              <div class="col-50">
              <label for="expmonth">Exp Month</label>                                        <!-- Expiration Month  -->
              <input type="text" id="expmonth" name="expmonth" placeholder="Exp month" required> 
              </div>                                   
            
              <div class="col-50">
                <label for="expyear">Exp Year</label>                                        <!-- Expiration Year  -->
                <input type="text" id="expyear" name="expyear" placeholder="year" required>
              </div>        
            </div>
          </div>
        </div>

        <input type="submit" value="Continue to checkout" class="btn" >  


      <script>  // This function is called when the form is submitted. 
        function submitForm(){                                                  // Stores the form's data into local storage to be displayed on the next page. 
          if(typeof(localStorage) != "undefined"){                       
            localStorage.name = document.getElementById("fname").value;        // Name     
            localStorage.address = document.getElementById("adr").value;       // Address
            localStorage.city = document.getElementById("city").value;         // City 
            localStorage.state = document.getElementById("state").value;       // State
            localStorage.zip = document.getElementById("zip").value;           // Zip
            localStorage.nameCC = document.getElementById("cname").value;      // Credit Card Name
            localStorage.cardNumber = document.getElementById("ccnum").value;  // Credit Card Number
            localStorage.cardCVV = document.getElementById("cvv").value;       // Credit Card CVV
            localStorage.expMonth = document.getElementById("expmonth").value; // Credit Card Expiration Month
            localStorage.expYear = document.getElementById("expyear").value;   // Credit Card Expiration Year
          }
            document.getElementById("form").submit();
           }
      </script>
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
