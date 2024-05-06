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
        <h1>Delete a movie</h1>
            <?php
                if ($error === "dvdnotFound") {
                    echo "<p class='error'>Something went wrong, DVD id not found </p>";
                }
                if ($success) {
                    echo "<p class='success'>Movie title has been successfully deleted!</p>";
                }
            ?>
            <form method="post" action="deleteMovie.php?action=process">
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
                        <td></td>
                        <td><input class="submitBtn" type="submit" value="Delete movie title"></td>
                    </tr>
                </table>
            </form>
        <footer>
            <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
        </footer>
        </div>
    </body>
</html>
