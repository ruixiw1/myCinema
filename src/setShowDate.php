<?php
require_once('connection.php');
require_once('./php/component.php');
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
    <?php
    //when form is submit
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['movie']) && isset($_POST['showDate'])) {
            //receive username and password
            $movie = htmlspecialchars($_POST['movie']);
            $showDate = htmlspecialchars($_POST['showDate']);
            //DB instance
            $connection = DBConnection::get_instance()->get_connection();
            //query string
            $err = $showDate;
            //execute query
            $DupDate = DBConnection::get_instance()->findDate($showDate);
            $sql = "UPDATE
            `all_movie`
            SET
            `date` = '".$showDate."'
            WHERE
            `id` = '".$movie."'";
            if ($DupDate) {
                $err = "showtime duplicated";
            } else {
                // Password is not valid, display a generic error message
                $result = mysqli_query($connection, $sql);
                if($result!=false){
                    $err="date updated";
                }
                else{
                    $err="update failed, pleas try later";
                }
            }
        } else {
            $err = "Something went wrong. Please try later";
        }
    }
    ?>
</head>

<body>
    <div class="main">
        <h1 class="header">Add Movie</h1>

        <form method="post">
            <div class="form-group col">
                <label for="">Movie</label>
                <select class="form-select" name="movie" aria-label="Default select example" required>
                    <option selected>Select a movie</option>
                    <?php foreach ($movies as $movie) : ?>
                        <?php echo '
                                <option value=' . $movie['id'] . '>
                                ' . $movie["movie_name"] . '
                                </option>'
                        ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group col">
                <label for="">Show Date</label>
                <input type="date" class="form-control" name="showDate" placeholder="Movie name" required>
            </div>
            <br>
            <div class="error">&nbsp;<?php echo $err ?></div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="./manageMovie.php">Back to Movies List</a>
        </form>
    </div>

</body>

</html>