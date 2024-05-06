<?php
    declare(strict_types=1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movies</title>
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
        <link rel="icon" href="img/icon.png">
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
                <?php foreach ($movieList as $movie) {
                    $available = 0;
                   ?>
                <tr>
                    <td><?php echo $movie->getTitle()?></td>
                    <td>
                    <?php
                        foreach ($dvdList as $dvd) {
                            if ($dvd->getMovieId() == $movie->getId()) {
                                if (!$dvd->isRented()) {
                                    $available++;
                                    echo "<b style='color:green'>  " . $dvd->getId() . "  </b>";
                                } else {
                                    echo $dvd->getId() . "  ";
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $available;
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
            <footer>
                <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>
