<?php
//include classes
session_start();
include_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en" class="background">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | About Us</title>
    <link href="./style/main.css" rel="stylesheet">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/866d4fbcee.js" crossorigin="anonymous"></script>
</head>
<body class="todayDeal">
    <nav>
        <a href="index.php"><span><h1 class ="logo">shopster.</h1></span></a>
        <div class="navbar" id="navbarNavAltMarkup">
            <ul>
                <li><a class="button-header" href="./index.php"><i>home</a></li>
                <li><a class="button-header" href="./productPage.php">products</a></li>
                <li><a class="button-header" href="./aboutPage.php">about</a></li>
                <?php
                 if(isset($_SESSION['logged_in'])&&$_SESSION["logged_in"]=true){
                    echo '<li style="float:right"><a class="button-header" href="./logout.php">Log Out</a></li>';
                    echo "<li style='margin:center'><a class='userHello'>Hello, " .$_SESSION['username']. "</i></a></li>";
                }
                 else{
                    echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                 }
                ?>
            </ul>
        </div>
    </nav>
    <div class>
        <div class="todayHeader">
            <h3>-   ABOUT US   -</h3>
        </div>
		<br><div class="aboutDiv">
			<h2> Our Story</h2>
			<p style="text-align:center;"> &emsp; Shopster was started in 2022 by a group of classmates who had a vision of making an online shopping service taylored towards getting the most high-end apparel and sneakers for screamingly good deals.  </p>
			<p style="text-align:center;"> &emsp; Our founders saw how products such as shoes were often hard to find or sold out and shopster was our solution. </p>
		</div>
		<br><div class="aboutDiv">
			<h2> Our Mission</h2>
			<p style="text-align:center;"> &emsp; To keep shopping simple, fast, and affordable through keeping the customer first and never compromising on quality.</p>
		</div>
		<br><div class="aboutDiv">
			<h2> Our Name</h2>
			<p style="text-align:center;"> &emsp; As simple as our mission. We wanted to provide monster deals to our shoppers. </p>
            <p style="text-align:center;"> <b> shopping + monster = shopster. </b> </p>
		</div>

    </div>
    <footer style="position: relative;" >
        Shopster &copy; 2022
    </footer>    

</body>


</html>
