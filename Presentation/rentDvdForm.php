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
            <h1>Rent a dvd</h1>
            <section>
                <table id="movieOverview" class="overview">
                    <caption>Movie Overview</caption>
                    <tr>
                        <th>Title</th>
                        <th>Dvd numbers</th>
                        <th>Available</th>
                    </tr>
                    <tr>
                        <?php echo generateMovieOverview($movieList, $dvdList)?>
                    </tr>
                </table>
            </section>
            <section>
                <h2>Rent a dvd</h2>
                <?php echo generateDvdRentSuccess($success); ?>
                <form method="post" action="rentDvd.php?action=rent">
                    <select id="dvdRentSelect" name="dvdRentSelect">
                        <option value="" hidden disabled selected>Choose dvd id</option>
                        <?php echo generateDvdSelect($dvdRentList); ?>
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
