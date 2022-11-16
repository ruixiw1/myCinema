<?php
session_start();
require_once('connection.php');
require_once('./php/component.php');
$database = DBConnection::get_instance();

if (isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
    $username =  $_SESSION['username'];
    $result = $database->userInfo($username);
    if ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        $nameOnCard = $row['nameOnCard'];
        $cardNumber = $row["cardNumber"];
        $cvv = $row['cvv'];
        $expMonth = $row['expMonth'];
        $expYear = $row['expYear'];
        $promotion = $row['promotion'];
        $billingAddress = $row['billingAddress'];
    }
}

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
        form {
            width: 70%;
            margin: 0 auto;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;

        }

        .button-wrapper {
            width: 50%;
            margin: auto;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            color: white;
            padding: 16px 20px;
            margin: 8px auto;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 1;
            background-color: lightskyblue;

        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        .red-star {
            color: red;
        }

        .avatar-img {
            max-width: 200px;
            max-height: 200px;
        }

        .text {
            margin: 1em 3em;
        }

        .Row {
            display: flex;
            align-items: center;
        }

        .Row input {
            width: 20%;
        }
    </style>
    <?php
    //when form is submit
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $currentPassword = htmlspecialchars($_POST['currentPassword']);
        $password = htmlspecialchars($_POST['newPassword']);
        $repeatPwd = htmlspecialchars($_POST['repeatPassword']);
        $cardNumber = htmlspecialchars($_POST['cardNumber']);
        $nameOnCard = htmlspecialchars($_POST['nameOnCard']);
        $billingAddress = htmlspecialchars($_POST['address']);
        $cvv = htmlspecialchars($_POST['cvv']);
        $expMonth = htmlspecialchars($_POST['expMonth']);
        $expYear = htmlspecialchars($_POST['expYear']);
        $promotion = isset($_POST['promotion']) ? 1 : 0;
        $usernameNotExist = DBConnection::get_instance()->usernameNotExist($username);
        if ($repeatPwd != $password) {
            $login_err = "Password not matched";
            goto end;
        } 
        $sql = "UPDATE
                `user_info`
            SET
                `username` = '" . $username . "',
                `password` = '" . encrypt_decrypt($password) . "',
                `cardNumber` = '" . encrypt_decrypt($cardNumber) . "',
                `cvv` = '" . $cvv . "',
                `expMonth` = '" . $expMonth . "',
                `expYear` = '" . $expYear . "',
                `promotion` = '" . $promotion . "',
                `billingAddress` = '" . $billingAddress . "',
                `nameOnCard` = '" . $nameOnCard . "'
            WHERE
                `email` = '" . $email . "'
                ";
        $result = mysqli_query($database, $sql);
        if ($result != false) {
           header("Refresh:0");
        } else {
            echo ("<script type='text/javascript'> console.log($msg);</script>");
            $login_err = "Invalid Info.";
        }
    }
    end:

    ?>
</head>

<body>

    <form method="POST">
        <div class="container">
            <h1>Edit Profile</h1>
            <p>Enter new user info and save</p>
            <hr>
            <div class="input_row">
                <label><b>Email</b></label>
                <input type="text" readonly name="email"  <?php echo 'value = "' . $email . '" ' ?>required>
            </div>
            <label><b>Username</b></label>
            <input type="text" placeholder="Username" name="username"  <?php echo 'value = "' . $username . '" ' ?>required>

            <label ><b>Current Password</b></label>
            <input type="password" placeholder="Current Password" name="currentPassword"  required>
            <label ><b>New Password</b></label>
            <input type="password" placeholder="Enter Password" name="newPassword"  required>
            <label ><b>Repeat Password</b></span></label>
            <input type="password" placeholder="Repeat Password" name="repeatPassword"  required>
            <label for="text"><b>Card number</b></label>
            <input type="text" placeholder="Card Number" name="cardNumber"  <?php echo 'value = "' . $cardNumber . '" ' ?> >
            <label ><b>Name on card<span></label>
            <input type="text" placeholder="Name on card" name="nameOnCard" <?php echo 'value = "' . $nameOnCard . '" ' ?>>
            <div class="Row">
                <label ><b>CVV</label>
                <input type="text" name="cvv"  <?php echo 'value = "' . $cvv . '" ' ?> required>
                <label ><b>Exp Year</label>
                <input type="text" name="expYear" <?php echo 'value = "' . $expYear . '" ' ?> required>
                <label ><b>Exp Month</label>
                <input type="text" name="expMonth" <?php echo 'value = "' . $expMonth . '" ' ?> required>
            </div>
            <label ><b>Billing Address</label>
            <input type="text" name="address" <?php echo 'value = "' . $billingAddress . '" ' ?> required>
            <label ><b>Promotion</label>
            <input type="checkbox" name="promotion" >
            <hr>
            <?php
            if (!empty($login_err)) {
                echo '<div style="text-align:center">' . $login_err . '</div>';
            } else {
                echo '<br>';
            }
            ?>
            <div class="button-wrapper">
                <button type="submit" class="registerbtn">Save</button>
            </div>


        </div>

    </form>


</body>

</html>