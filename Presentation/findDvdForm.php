<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Video Store</title>
    <link rel="icon" href="../Presentation/img/icon.png">
    <style><?php include "css/style.css" ?></style>
</head>
<body>
<div id="wrapper" class="container">
    <h1>Find a dvd</h1>
    <?php
        if (!is_null($error) && $error === "DvdNotFound") {
            ?>
            <p class="error"> Dvd not found!</p>
            <?php
        }
        if (!is_null($error) && $error === "invalidId") {
            ?>
            <p class="error">Something went wrong. We couldn't find anything in matching this id</p>
            <?php
        }
        if ($success) {
    ?>
    <table>
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
                <td><?php echo $movie->getTitle() ?></td>
                <td>
                    <?php
                        foreach ($dvdList as $dvd) {
                            if ($dvd->getMovieId() == $movie->getId()) {
                                if (!$dvd->isRented()) {
                                    $available++;
                                    echo "<b style='color:green'> " . $dvd->getId() . " </b>";
                                } else {
                                    echo $dvd->getId() . " ";
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
        }
            ?>
    </table>
    <form method="post" action="findDvd.php?action=process">
        <table>
            <tr>
                <td>Select a dvd id</td>
            </tr>
            <tr>
                <td>
                    <select id="dvdIdSelect" name="idSelect" required>
                        <option value="" hidden disabled selected>Choose dvd id</option>
                        <?php
                            foreach ($dvdList as $dvd) {
                                ?>
                                <option value="<?php echo $dvd->getId() ?>">
                                    <?php echo $dvd->getId() ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submitBtn" type="submit" value="Find DVD"</td>
            </tr>
        </table>
    </form>
    <footer>
        <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
    </footer>
</div>
</body>
</html>