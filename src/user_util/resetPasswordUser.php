<?php
require_once('../connection.php');
require_once('../php/component.php');
session_start();
$db = DBConnection::get_instance();
$connection = $db->get_connection();

if ($_SERVER['REQUEST_METHOD'] == "POST") { 
    //Input validation and encryption
    if (isset($_POST['new_password']) && isset($_POST['re_password'])&& isset($_POST['current_password'])) {
        $password= htmlspecialchars($_POST['new_password']);
        $password2 = htmlspecialchars($_POST['re_password']);
        $currentPassword = htmlspecialchars($_POST['current_password']);
        $email= htmlspecialchars($_SESSION['email']);
        if(strcmp($password, $password2)!=0){
            $err = "Password must match";
            
        }
        else if(!$db->checkCurrentPassword($email,encrypt_decrypt($currentPassword))){
            $err = "wrong current password";
        }
        else{
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if (strlen($password) < 8 || !$number || !$uppercase || !$specialChars) {
            $err = "Password must have at least 8 characters, a number, a capital letter, and a special character";
        } else {
            $sql = "UPDATE user_info SET `password` ='" . encrypt_decrypt($password) . "' WHERE `email` = '" .$email. "' ";
            $result = mysqli_query($connection, $sql);
            if ($result != false) {
                echo "<script>alert('reset sucessful')</script>";
            } else {
                $err = "Some things went wrong";
            }
        }
      }
    }
    else{
        $err ="Please enter valid info";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecinema | Reset</title>
    <link href="../style/main.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="../style/misc-style.css" rel="stylesheet">
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


    <div class="main">
        <div class="loginWindow">
            <div class="loginForm">
                <form method="post">
                <div class="form-group">
                        <p>Current Password:</p>
                        <input name="current_password" placeholder="Current Password" type="password" required>
                    </div>
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
                    if (!empty($err)) {
                        echo '<div class="msg">' . $err . '</div>';
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
            <br/>
            <a href="../userPortalMain.php" class="registerbtn">Back</a>

        </div>

</body>


</html>