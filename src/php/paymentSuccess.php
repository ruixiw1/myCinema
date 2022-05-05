<?php
//clear cookie
if(isset($_COOKIE['shopping_cart'])){
setcookie('shopping_cart', '', time() - 3600,'/');
}
header("Location: ../static/paymentSuccess.html");
?>