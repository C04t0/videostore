<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="img/icon.png">
        <style><?php include "Presentation/css/style.css"?></style>
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>Add a new dvd</h1>
            <?php
                if ($error === "dvdIdExists") {
                    ?>
                    <p class="error">A dvd with this id already exists!</p>
                    <?php
                }
                if ($error === "dvdMovieIdInvalid") {
                    ?>
                    <p class="error">Something went wrong! Either dvd id already exists or movie title - dvd id combo is invalid.</p>
                    <?php
                }
                if ($success) {
                    ?>
                    <p class="success">Dvd successfully added!</p>
                    <?php
                }
            ?>
            <table id="dvdOverview" class="overview">
                <caption>DVD OVERVIEW</caption>
                <tr>
                    <th>Dvd ID's already taken</th>
                </tr>
                <tr>
                    <?php foreach ($dvdList as $dvd) {
                        ?>
                        <td>
                            <?php
                                echo $dvd->getId();
                            ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
            <form method="post" action="addDvd.php?action=process">
                <table>
                    <tr>
                        <td>Select a movie title: </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="movieSelect" name="movieId" required>
                                <?php
                                    foreach ($movieList as $movie) {
                                        ?>
                                        <option value="<?php echo $movie->getId(); ?>">
                                            <?php echo $movie->getTitle(); ?>
                                        </option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Choose a new dvd id: </td>
                    </tr>
                    <tr>
                        <td><input type="number" min="1" name="dvdId" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="submitBtn" type="submit" value="Add DVD"></td>
                    </tr>
                </table>
            </form>
            <footer>
                <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>