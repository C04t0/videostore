
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="../Presentation/img/icon.png">
        <style><?php include "Presentation/css/style.css"?></style>
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>Rent a dvd</h1>
            <section>
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
                                                echo "<b style='color: green'> " . $dvd->getId() . " </b>";
                                            } else {
                                                echo "<b style='color:red'>" . $dvd->getId() . " </b>";
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
            </section>
            <section>
                <h2>Rent a dvd</h2>
                <?php if ($success === true) {
                    ?>
                    <p class="success">DVD has been successfully rented!</p>
                <?php
                    }
                ?>
                <form method="post" action="rentDvd.php?action=rent">
                    <select id="dvdRentSelect" name="dvdRentSelect">
                        <option value="" hidden disabled selected>Choose dvd id</option>
                        <?php
                            foreach ($dvdRentList as $dvd) {
                                ?>
                        <option value="<?php echo $dvd->getId(); ?>">
                            <?php
                                    echo $dvd->getId();
                            ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                    <input class="submitBtn" type="submit" value="Rent">
                </form>
            </section>
            <footer>
                <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>
