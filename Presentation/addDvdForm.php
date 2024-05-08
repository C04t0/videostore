<?php
    declare(strict_types=1);
    require_once 'Presentation/scripts/generateOverview.php';
    require_once 'Presentation/scripts/generateErrorSuccess.php';
?>


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
            <h1>Add a new dvd</h1>
            <?php echo generateDvdErrorSuccess($error, $success); ?>
            <table id="dvdOverview" class="overview">
                <caption>DVD OVERVIEW</caption>
                <tr>
                    <th>Dvd ID's already taken</th>
                </tr>
                <tr>
                    <?php echo generateDvdOverview($dvdList); ?>
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
                                <?php echo generateMovieSelect($movieList); ?>
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