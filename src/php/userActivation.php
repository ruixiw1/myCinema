<?php
    require_once('../connection.php');
    require_once('./component.php');
    $email = $_GET['email'];
    $connection = DBConnection::get_instance()->get_connection();
    $sql = "UPDATE user_info SET `active` = 1 WHERE `email` = '".encrypt_decrypt($email,'decrypt')."' ";
    $result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycinema | Activation</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <style>
        .msg{
            width: 50%;
            padding: 2em;
            margin: 3em auto;
            text-align: center;
            background-color:white;
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <div class="msg">
        <h1>Account Activated</h1>
        <a href="../loginPage.php">Go to login</a>
    </div>

</body>

</html>