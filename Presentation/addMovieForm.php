<?php
    declare(strict_types=1);
    require_once 'Presentation/scripts/generateErrorSuccess.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="../Presentation/img/icon.png">
        <style><?php include "css/style.css"?></style>
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>Add a new movie title</h1>
            <?php echo generateMovieErrorSuccess($error, $success); ?>
            <form method="post" action="addMovie.php?action=process">
                <table>
                    <tr>
                        <td>Movie title: </td>
                        <td><input type="text" name="title" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="submitBtn" type="submit" value="Add movie title"></td>
                    </tr>
                </table>
            </form>
            <footer>
                <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>
