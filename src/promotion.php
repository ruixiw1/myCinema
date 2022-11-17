<?php
try {
    $dsn = 'mysql:host=localhost;dbname=mycinema';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>";
}
//Product of a category
$queryProducts = 'SELECT * FROM  all_movie';
$statement = $db->prepare($queryProducts);
$statement->execute();
$movies = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Show Movie</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .main {
            margin: auto;
            width: 70%;
        }

        body {
            background-color: hsl(222, 25%, 10%) !important;
        }

        .header {
            padding: 1px;
            color: white;
        }

        form {
            background-color: white;
            padding: 1em;
        }
    </style>
</head>

<body>
    <div class="main">
        <h1 class="header">Send Promotion</h1>

        <form method="post" action="sendMail.php">
            <div class="form-group col">
                <label for="">Movie</label>
                <select class="form-select" name="movie" aria-label="Default select example" required>
                    <option selected>Select a movie</option>
                    <?php foreach ($movies as $movie) : ?>
                        <?php echo '
                                <option value=' . $movie['id'] . '>
                                ' . $movie["movie_name"] . '
                                </option>
                                ';
                        ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group col">
                <label for="">Promotion Message</label>
                <textarea class="form-control " class="form-control" name="message" placeholder="Message"></textarea>
            </div>
            <br>
            <div class="error">&nbsp;<?php echo $err ?></div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="./adminMain.php">Back to Admin</a>
        </form>
    </div>

</body>

</html>