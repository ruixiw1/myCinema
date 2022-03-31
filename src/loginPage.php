<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | Log in</title>
    <link href="./style/main.css" rel="stylesheet">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <style>
        #LogIn-Toggle {
            border-bottom: 2px solid gray;
        }

    </style>
</head>

<body>
    <nav>
    <a href="index.php"><span><h1 class ="logo">shopster.</h1></span></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul>
                <li><a href="./index.php">home</a></li>
                <li><a href="#news">products</a></li>
                <li><a href="#contact">about</a></li>
                <?php
                echo '<li style="float:right"><a class="active" href="./loginPage.php">Log in</a></li>';
                ?>
            </ul>
        </div>
    </nav>
    <div class="loginWindow">
        <div class="toggleContainer">
            <a href="./registerPage.php"><button id="SignUp-Toggle" class="toggleButton">Sign Up</button></a>
            <a href="./loginPage.php"> <button id="LogIn-Toggle" class="toggleButton">Log In</button></a>
        </div>
        <div class="LoginForm">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="user-name">Username</label>
                    <input type="text" name="user_name" class="form-control" id="user-name" placeholder="Username" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="user-phone">Password</label>
                    <input type="password" name="user_password" class="form-control" id="user-password" placeholder="Password" required>
                </div>
                <a href="">Forgot Password</a>
                <br>
                <div class='buttonBox'>
                    <button type="submit" class="submittButt">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>

<footer>
    Shopster &copy; 2022
</footer>

</html>