<?php
require_once('connection.php');
require_once('./php/component.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | Log in</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #LogIn-Toggle {
            border-bottom: 2px solid gray;
        }
    </style>
    <?php
    //when form is submit
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['user_name']) && isset($_POST['user_password'])) {
            //receive username and password
            $username = htmlspecialchars($_POST['user_name']);
            $password = htmlspecialchars($_POST['user_password']);
            //DB instance
            $connection = DBConnection::get_instance()->get_connection();
            //query string
            $sql = "SELECT * FROM user_info WHERE username = '" . $username . "' AND password = '" . encrypt_decrypt($password) . "'";
            //execute query
            $result = mysqli_query($connection, $sql);
            if ($result != false) {
                //session_start when credential found in database
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $username;
                    $_SESSION["logged_in"] = true;

                    setcookie("username", $username, time() + (86400 * 30), "/");

                    header('Location:static/redirectLogin.html');
                } else {
                    // Password is not valid, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
            }
        } else {
            $login_err = "Something went wrong. Please try later";
        }
    }
    ?>
</head>

<body class="background">
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
                    echo '<li style="float:right"><a class="button-header" href="./logout.php">Log Out</i></a></li>';
                } else {
                    echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="main">
        <div class="loginWindow">
            <div class="toggleContainer">
                <a href="./registerPage.php"><button id="SignUp-Toggle" class="toggleButton">Sign Up</button></a>
                <a href="./loginPage.php"> <button id="LogIn-Toggle" class="toggleButton">Log In</button></a>
            </div>
            <div class="loginForm">
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
                    <?php
                    if (!empty($login_err)) {
                        echo '<div style="text-align:center">' . $login_err . '</div>';
                    } else {
                        echo '<br>';
                    }
                    ?>
                    <div id = "forgotPwd">
                    <a href="./forgotPassword.php">Forgot Password</a>
                    </div>
                    <br>
                    <br>

                    <div class='buttonBox'>
                        <button type="submit" class="submittButton">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<footer >
        Shopster &copy; 2022
</footer>

</html>
