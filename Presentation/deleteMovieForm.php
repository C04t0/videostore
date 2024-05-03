<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="img/icon.png">
        <style><?php include "css/style.css"?></style>
    </head>
    <body>
        <div id="wrapper" class="container">
        <h1>Delete a movie</h1>
            <?php
                if ($success) {
            ?>
            <p class="success">Movie title has been successfully deleted!</p>
            <?php
                }
            ?>
            <form method="post" action="../deleteMovie.php?action=process">
                <table>
                    <tr>
                        <td>Select a movie title</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="movieTitleSelect" name="titleSelect" required>
                            <?php
                            foreach ($movieList as $movie) {
                                ?>
                                <option value="<?php echo $movie->getTitle(); ?>">
                                    <?php echo $movie->getTitle(); ?>
                                </option>
                            <?php
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Delete movie title"></td>
                    </tr>
                </table>
            </form>
        </div>
        <footer>
            <button onclick="location.href='movies.php'">Return to main menu</button>
        </footer>
    </body>
</html>