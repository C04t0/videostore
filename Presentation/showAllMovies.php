<?php
    declare(strict_types=1);

    $movieService = new Business\MovieService();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movies</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/icon.png">
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>Movies</h1>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Dvd numbers</th>
                    <th>Available copies</th>
                </tr>
                <tr>
                    <td>
                        <?php foreach ($movieList as $movie) {
                            $movie->getTitle();
                            ?>
                    </td>
                    <td>
                        <?php
                            $dvdList = $movieService->getDvdsByMovieId($movie->getId());
                            foreach ($dvdList as $dvd) {
                                if (!$dvd->isRented()) {
                                    echo '<b>' . $dvd->getTitle() . '</b>';
                                } else {
                                    $dvd->getId();
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php $movieService->getAvailableCopies(); ?>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>