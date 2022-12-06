<?php
session_start();

try {
    $dsn = 'mysql:host=localhost;dbname=mycinema';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>";
}
if(isset($_SESSION['username'])){
    $user = htmlspecialchars($_SESSION['username']);
}
//Product of a category
$query = "SELECT * FROM  `bookingtable` where `username` = '$user' ";
$statement = $db->prepare($query);
$statement->execute();
$tickets = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movie</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .main {
            margin: auto;
            width: 70%;
        }

        body {
            background-color: hsl(222, 25%, 10%) !important;
        }

        table {
            background-color: white;
        }

        .header {
            padding: 1px;
            color: white;
        }

        .addMovie {
            font-size: larger;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <h1 class="header">Manage Movie</h1>
        <table class="table table-striped">
            <tr>
                <th>Movie</th>
                <th>Date</th>
                <th>Hall</th>
                <th>Time</th>
                <th>Quantity</th>
            </tr>
            <?php foreach ($tickets as $ticket) : ?>
                <tr>
                    <td>
                        <?php echo $ticket['moviename']; ?>
                    </td>
                    <td>
                        <?php echo $ticket['bookingDate']; ?>
                    </td>
                    <td>
                        <?php echo $ticket['theatre']; ?>
                    </td>
                    <td>
                        <?php echo $ticket['showtime']; ?>
                    </td>
                    <td>
                        <?php echo $ticket['quantity']; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="5">
                    <a href="../userPortalMain.php" class="btn btn-primary">Back</a>
                </td>
            </tr>

        </table>
    </div>

</body>

</html>