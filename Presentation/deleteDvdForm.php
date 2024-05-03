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
            <h1>Delete a dvd</h1>
            <?php
                if ($success) {
            ?>
            <p class="success">Dvd has been successfully deleted!</p>
            <?php
            }
            ?>
        </div>
        <form method="post" action="../deleteDvd.php?action=process">
            <table>
                <tr>
                    <td>Select a DVD id</td>
                </tr>
                <tr>
                    <td>
                        <select id="dvdIdSelect" name="idSelect" required>
                            <?php
                                foreach ($dvdRentList as $dvd) {
                                    ?>
                            <option value="<?php echo $dvd->getId(); ?>">
                                <?php echo $dvd->getId(); ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Delete DVD"></td>
                </tr>
            </table>
        </form>
        <footer>
            <button onclick="location.href='movies.php'">Return to main menu</button>
        </footer>
    </body>
</html>
