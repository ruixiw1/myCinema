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
if(isset($_POST['search'])){
    $word = "%".htmlspecialchars($_POST['search'])."%";   
}

//Product of a category
$querymovies = "SELECT * FROM  `all_movie` where `movie_name` like '".$word."' " ;
$statement = $db->prepare($querymovies);
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
    <title>Search</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/media_query.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <style>
        iframe {
            width: 100%;
            height: 100%;
        }

        .bookLink {
            position: absolute;
            color: white;
            z-index: 20;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            border: 1px solid white;
            padding: 3px;
            border-radius: 2px;
            text-align:center;

        }
        .cardText{
            position: absolute;
            color: white;
            z-index: 21;
            bottom:0;
            left:50%;
            transform: translate(-50%, -50%);
            opacity: 1;
            text-align:center;
        }

        .category-card:hover .bookLink {
            opacity: 1;
        }
        .category-card:hover .cardText{
            opacity: 0;
            display: none;
        }
        .link {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }
    </style>
</head>
<body>
<header class="">
            <div class="navbar">


                <button class="navbar-menu-btn">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

                <nav class="">
                    <ul class="navbar-nav">

                        <li> <a href="./index.php" class="navbar-link">Home</a> </li>
                        <li> <a href="#category" class="navbar-link">Category</a> </li>
                        <?php
                        if(isset($_SESSION['admin']) && $_SESSION["admin"] = true){
                            echo "<li style='margin:center'><a href='./adminMain.php' class='userHello'>Admin</i></a></li>";

                        }
                        else if(isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
                            echo "<li style='margin:center'><a href='./userPortalMain.php' class='userHello'>Hello, " . $_SESSION['username'] . "</i></a></li>";
                        }
                        ?>
                    </ul>

                </nav>

                <div class="navbar-actions">

                    <form action="#" class="navbar-form">
                        <input type="text" name="search" placeholder="I'm looking for..." class="navbar-form-search">

                        <button class="navbar-form-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>

                        <button class="navbar-form-close">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </button>
                    </form>

                    <button class="navbar-search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>

                    <a href="./login.html" class="navbar-signin">
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
                            echo '<li style="float:right"><a class="button-header" href="./logout.php">Log Out</a></li>';
                        } else {
                            echo '<li style="float:right"><a class="button-header" href="./loginPage.php">Log In</i></a></li>';
                        }
                        ?>
                        <ion-icon name="log-in-outline"></ion-icon>
                    </a>


                </div>

            </div>
        </header>
        <section class="category" id="category">
        <div class="category-grid">
        <?php foreach ($movies as $movie) : ?>
                        <?php echo '
                                <div class="category-card">
                                <img src="'.$movie['image'].'" alt="" class="card-img">
                                <div class="bookLink">
                                    <a href="./bookingTicket.php?id='.$movie['id'].'&time='.$movie['date'].'&theatre=">
                                    Book Movie
                                    </a>
                                </div>
                                <div class="cardText">
                                    <div>'.$movie['movie_name'].'</div>
                                    <div>'.$movie['date'].'</div>
                                </div>
                                </div>'
                        ?>
                <?php endforeach; ?>
        </div>
        </section>
</body>
</html>