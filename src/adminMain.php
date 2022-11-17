<?php
    if(isset($_SESSION["user_name"])){
        $username = $_SESSION["user_name"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Main</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/media_query.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <style>
        .container{
            background-color: #333;
            width: 70%;
            margin:auto;
            padding:20px;
        }

        a{
            margin:auto 1em;
            padding:5px 10px;
            width:fit-content;
        }
        a:hover{
            background-color: #fff;
            color:#333;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="container" style="margin:1em auto;"><h1>Admin Portal</h1></div>
        <div class="container">
            <h1>Welcome,<?php echo $username; ?></h1>
            <a href="">Manage Users</a>
            <a href="manageMovie.php">Manage Movies</a>
            <a href="promotion.php">Promotion</a>
        </div>
    </div>
</body>
</html>