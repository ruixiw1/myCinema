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
<html>
    <head>
        <meta charset="utf-8" />
        <title>myCinema</title>
    </head>
    <body>
      <header>
        <ul>
          <li><a href="myCinemaIndex.html" title="index"><strong>Acceuil</strong></a></Li>
          <li><a href="searchMovie.php" title="rechercheMovie"><strong>Rechercher un Movie</strong></a></Li>
          <li><a href="myCinemaSearchMembre.html" title="rechercheMovie"><strong>Rechercher un membre</strong></a></Li>
        </ul>
      </header>
      <form action="rechercheMovietitre.php" method="post">
        <input type="text" name="keywords" placeholder="rechercher Movie par titres">
        <input type="submit" name="form" value="Rechercher">
      </form>
        <strong>Rechercher films par genre</strong>
      <form action="rechercheMoviegenre.php" method="post">
        <select name="type">
          <option value = "NULL">Aucun</option>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', '');
          $genres = $bdd->query("SELECT * FROM tp_genre");
          foreach($genres as $genre)
          {
            echo '<option value="'.$genre["nom"].'">'.$genre["nom"].'</option>';
          }
        ?>
        </select>
        <input type="submit" name="form" value="Rechercher">
      </form>
      <strong>Rechercher films par distributeurs</strong>
    <form action="rechercheMoviedistri.php" method="post">
      <select name="typetwo">
        <option value = "NULL">Aucun</option>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=my_cinema;charset=utf8', 'root', 'root');
          $distris = $bdd->query("SELECT * FROM tp_distrib");
          foreach($distris as $distri)
          {
            echo '<option value="'.$distri["nom"].'">'.$distri["nom"].'</option>';
          }
        ?>
        </select>
        <input type="submit" name="form" value="Rechercher">
    </form>
    </body>
</html>
