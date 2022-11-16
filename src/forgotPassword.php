<?php

require_once('connection.php');
if(isset($_GET['msg'])){
$msgCode = htmlspecialchars($_GET['msg']);
//error handling
if ($msgCode == 'success') {
    $msg = "Email Sent";
} else if ($msgCode == 'nofound') {
    $msg = "No account match with this email address, Please register";
} else if ($msgCode == 'fail') {
    $msg = "Somthing went wrong, try again";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cinema| Forgot Password</title>
    <link href="./style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- css only apply to this page -->
    <style>
        input {
            margin: auto;
        }

        p {
            text-align: center;
        }

        .form-div {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
   
    <div>
        <div class="loginWindow">
            <div class="loginForm">
                <!-- form for user to enter email address -->
                <form method="post" action="./resetPassword.php">
                    <p> Enter the E-mail of your account to reset your password...</p>
                    <br>
                    <div class="form-div">
                        <input class="input-form" type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <br>
                    <?php
                    if (!empty($msg)) {
                        echo '<div style="text-align:center">' . $msg . '</div>';
                    } else {
                        echo '<br>';
                    }
                    ?>
                    <br>
                    <div class="form-div">
                        <button type="submit" class="submittButton" name="reset-request-submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>



</html>