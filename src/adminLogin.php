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
    <title>Ecinema | Admin Log in</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #LogIn-Toggle {
            border-bottom: 2px solid gray;
        }

        .adminHeader{
            border: none;
        }
    </style>
    <?php
    //when form is submit
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['adminUsername']) && isset($_POST['adminPassword'])) {
            //receive username and password
            $adminUsername = htmlspecialchars($_POST['adminUsername']);
            $adminPassword = htmlspecialchars($_POST['adminPassword']);
            //DB instance
            $connection = DBConnection::get_instance()->get_connection();
            //query string
            $sql = "SELECT * FROM `admin` WHERE `user_name` = '" . $adminUsername. "' AND password = '" . $adminPassword . "'";
            //execute query
            $result = mysqli_query($connection, $sql);
            if ($result != false) {
                //session_start when credential found in database
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION["username"] = $row["user_name"];
                    $_SESSION["logged_in"] = true;
                    $_SESSION["admin"] =true;

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

<body>
   
    <div class="main">
        <div class="loginWindow">
            <div class="adminHeader">
                <h1>Admin Login</h1>
            </div>
            <div class="loginForm">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="user-name">Admin name</label>
                        <input type="text" name="adminUsername" class="form-control"  placeholder="admin name" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="user-phone">Password</label>
                        <input type="password" name="adminPassword" class="form-control" placeholder="password" required>
                    </div>
                    <?php
                    if (!empty($login_err)) {
                        echo '<div style="text-align:center">' . $login_err . '</div>';
                    } else {
                        echo '<br>';
                    }
                    ?>
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

</html>
