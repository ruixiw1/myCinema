<?php
//include class
session_start();
require_once('./php/component.php');
require_once('./connection.php');
$database = DBConnection::get_instance();
try {
    $dsn = 'mysql:host=localhost;dbname=mycinema';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>";
}
$date = date('Y-m-d');
//Product of a category
$queryProducts = 'SELECT * FROM  all_movie where `date` > "'.$date.'" ORDER BY `date` ASC' ;
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
    <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
    <title>CineFlix</title>
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
<a class="CartIcon" href="./checkOutPage.php">Check Out</a>

    <div class="container">

        <header class="">
            <div class="navbar">


                <button class="navbar-menu-btn">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

                <nav class="">
                    <ul class="navbar-nav">

                        <li> <a href="#" class="navbar-link">Home</a> </li>
                        <li> <a href="#category" class="navbar-link">Category</a> </li>
                        <?php
                        if(isset($_SESSION['admin']) && $_SESSION["admin"] = true){
                            echo "<li style='margin:center'><a href='./adminMain.php' class='userHello'>Admin</i></a></li>";

                        }
                        else if(isset($_SESSION['logged_in']) && $_SESSION["logged_in"] = true) {
                            echo "<li style='margin:center'><a href='./editProfile.php' class='userHello'>Hello, " . $_SESSION['username'] . "</i></a></li>";
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
        <main>
            <section class="banner">
                <div class="banner-card">

                    <!-- <img src="./assets/images/John-Wick-3.jpg" class="banner-img" alt=""> -->
                    <iframe src="https://www.youtube.com/embed/M7XM597XO94" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    <div class="card-content">

                        <h2 class="card-title">John Wick: Chapter 3 - Parabellum</h2>
                    </div>

                </div>
            </section>
            <section class="category" id="category">

                <h2 class="section-heading">Category</h2>

                <div class="category-grid">

                    <div class="category-card">
                        <img src="./assets/images/action.jpg" alt="" class="card-img">
                        <div class="name">Action</div>
                        <div class="total">100</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/comedy.jpg" alt="" class="card-img">
                        <div class="name">Comedy</div>
                        <div class="total">50</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/thriller.webp" alt="" class="card-img">
                        <div class="name">Thriller</div>
                        <div class="total">20</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/horror.jpg" alt="" class="card-img">
                        <div class="name">Horror</div>
                        <div class="total">80</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/adventure.jpg" alt="" class="card-img">
                        <div class="name">Adventure</div>
                        <div class="total">100</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/animated.jpg" alt="" class="card-img">
                        <div class="name">Animated</div>
                        <div class="total">50</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/crime.jpg" alt="" class="card-img">
                        <div class="name">Crime</div>
                        <div class="total">20</div>
                    </div>

                    <div class="category-card">
                        <img src="./assets/images/sci-fi.jpg" alt="" class="card-img">
                        <div class="name">SCI-FI</div>
                        <div class="total">80</div>
                    </div>

                </div>

            </section>
            <section class="category" id="category">

                <h2 class="section-heading">Upcoming</h2>

                <div class="category-grid">
                <?php foreach ($movies as $movie) : ?>
                        <?php echo '
                                <div class="category-card">
                                <img src="'.$movie['image'].'" alt="" class="card-img">
                                <div class="bookLink">
                                    Book Movie
                                    <a href="./bookingTicket.php?id='.$movie['id'].'&time='.$movie['date'].'&theatre=">
                                    <span class="link"></span>
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


    </div>

    </section>
    <section class="category" id="category">
        <h2 class="section-heading">Currently Showing</h2>
        <div class="category-grid">
            <div class="category-card">
                <img src="./assets/images/adventure.jpg" alt="" class="card-img">
            </div>

            <div class="category-card">
                <img src="./assets/images/animated.jpg" alt="" class="card-img">
            </div>

            <div class="category-card">
                <img src="./assets/images/crime.jpg" alt="" class="card-img">
            </div>
            <div class="category-card">
                <img src="./assets/images/sci-fi.jpg" alt="" class="card-img">
            </div>
        </div>
    </section>
    </div>


    <script src="./assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>