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
    <title>Ecinema | Log in</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
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
        if (isset($_POST['email']) && isset($_POST['user_password'])) {
            //receive username and password
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['user_password']);
            //DB instance
            $connection = DBConnection::get_instance()->get_connection();
            //query string
            $sql = "SELECT * FROM user_info WHERE email = '" . $email. "' AND password = '" . encrypt_decrypt($password) . "'";
            //execute query
            $result = mysqli_query($connection, $sql);
            if ($result != false) {
                
                //session_start when credential found in database
                if ($result->num_rows > 0) {
                    if($row['active']==0){
                        $login_err = "Account not activated";
                    }
                    else{
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["logged_in"] = true;
                    setcookie("username", $username, time() + (86400 * 30), "/");
                    header('Location:index.php');
                    }
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

<body>
   
    <div class="main">
        <div class="loginWindow">
            <div class="toggleContainer">
                <a href="./registerPage.php"><button id="SignUp-Toggle" class="toggleButton">Sign Up</button></a>
                <a href="./loginPage.php"> <button id="LogIn-Toggle" class="toggleButton">Log In</button></a>
            </div>
            <div class="loginForm">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="user-name">Email</label>
                        <input type="text" name="email" class="form-control" id="user-name" placeholder="Email" required>
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
                    <div id = "forgotPwd">
                    <a href="./adminLogin.php">admin</a>
                    </div>
                    <br>

                    <div class='buttonBox'>
                        <button type="submit" class="submittButton">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
