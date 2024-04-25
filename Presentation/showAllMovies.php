<?php
    declare(strict_types=1);
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
            <h1>All movies</h1>
            <table>
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
                                    echo "<b> " . $dvd->getId() . " </b>";
                                } else {
                                    echo $dvd->getId();
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
        </div>
    </body>
</html>
