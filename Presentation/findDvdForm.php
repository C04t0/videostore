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
            <h1>Find a dvd</h1>
            <?php
                if (!is_null($error)) {
                    ?>
                    <p class="error"> Dvd not found!</p>
                    <?php
                }
            ?>
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
                                            <option value="<?php $dvd->getId()?>">
                                                <?php echo $dvd->getId()?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Find dvd"</td>
                        </tr>
                    </table>
                </form>
            <footer>
                <button class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>