<?php
require_once('connection.php');
?>

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
        #SignUp-Toggle {
            border-bottom: 2px solid gray;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['email'])) {
            $username = htmlspecialchars($_POST['user_name']);
            $password = htmlspecialchars($_POST['user_password']);
            $email = htmlspecialchars($_POST['email']);

            $connection = DBConnection::get_instance()->get_connection();
            $sql = "INSERT INTO user_info (`username`, `password`, `email`) VALUES ('" . $username . "','" . $password . "','" . $email . "')";
            $result = mysqli_query($connection, $sql);
            if ($result != false) {
                echo("<script type='text/javascript'> console.log($msg);</script>");
                header('Location: static/redirectSignIn.html');
            } else {
                $login_err = "Invalid Info.";
            }
        }
    }
    ?>
    <nav>
        <a href="index.php"><span>
                <h1 class="logo">shopster.</h1>
            </span></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul>
                <li><a class="button-header" href="./index.php">home</a></li>
                <li><a class="button-header" href="#news">products</a></li>
                <li><a class="button-header" href="#contact">about</a></li>
                <?php
                echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log in</a></li>';
                ?>
            </ul>
        </div>
    </nav>
    <div class="loginWindow">
        <div class="toggleContainer">
            <a href="./registerPage.php"><button id="SignUp-Toggle" class="toggleButton">Sign Up</button></a>
            <a href="./loginPage.php"> <button id="LogIn-Toggle" class="toggleButton">Log In</button></a>
        </div class="LoginForm">
        <form id="register-form" method="POST">
            <div class="form-group">
                <label for="Email">Email:</label>
                <input class="input-form" name="email" placeholder="Email Address" required>
            </div>
            <br>
            <div class="form-group">
                <label for="Email">Username:</label>
                <input class="input-form" name="user_name" placeholder="Username" required>
            </div>
            <br>
            <div class="form-group">
                <label for="Email">Password:</label>
                <input class="input-form" name="user_password" placeholder="Password" required>
            </div>
            <br><?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                } else {
                    echo '<br>';
                }
                ?>
            <div class='buttonBox'>
                <button type="submit" class="submittButton">Sign Up</button>
            </div>
        </form>
    </div>

</body>
<footer>
    Shopster &copy; 2022
</footer>

</html>