<?php
    declare(strict_types=1);
    require_once 'Presentation/scripts/generateOverview.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movies</title>
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
        <link rel="icon" href="../Presentation/img/icon.png">
        <style><?php require_once "css/style.css"?></style> <!-- avoid mime-type error -->
    </head>
    <body>
        <div id="wrapper" class="container">
            <table id="movieOverview" class="overview">
                <caption>Movie Overview</caption>
                <tr>
                    <th>Title</th>
                    <th>Dvd numbers</th>
                    <th>Available</th>
                </tr>
                <?php
                    echo generateMovieOverview($movieList, $dvdList);
                ?>
            </table>
            <footer>
                <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>
