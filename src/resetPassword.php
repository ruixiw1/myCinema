<?php
require_once('connection.php');
require_once('./php/component.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Input validation and encryption
    if (isset($_POST['new_password']) && isset($_POST['re_password'])&& isset($_GET['email'])) {
        $password= htmlspecialchars($_POST['new_password']);
        $password2 = htmlspecialchars($_POST['re_password']);
        $email= htmlspecialchars($_GET['email']);
        if(strcmp($password, $password2)!=0){
            $login_err = "Password must match";
            goto ex;
        }
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if (strlen($password) < 8 || !$number || !$uppercase || !$specialChars) {
            $login_err = "Password must have at least 8 characters, a number, a capital letter, and a special character";
        } else {
            $connection = DBConnection::get_instance()->get_connection();
            $sql = "UPDATE user_info SET `password` ='" . encrypt_decrypt($password) . "' WHERE `email` = '" . $email . "' ";
            $result = mysqli_query($connection, $sql);
            if ($result != false) {
                header('Location: static/resetSuccess.html');
            } else {
                $login_err = "Some things went wrong";
            }
        }
    }
}
ex:
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | Reset</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .msg{
            text-align:center;
        }
    </style>
    <?php
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
            <div class="loginForm">
                <form method="post">
                    <br>
                    <div class="form-group">
                        <p>New Password:</p>
                        <input name="new_password" placeholder="New Password" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <p>Re-enter Password:</p>
                        <input type="password" class="input-form" name="re_password" placeholder="Re-Enter" required>
                    </div>
                    <br>
                    <?php
                    if (!empty($login_err)) {
                        echo '<div class="msg">' . $login_err . '</div>';
                    } else {
                        echo '<br>';
                    }
                    ?>
                    <br>
                    <div class="buttonBox">
                        <button type="submit" class="submittButton" name="reset-request-submit">Reset Password</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<footer>
    Shopster &copy; 2022
</footer>

</html>