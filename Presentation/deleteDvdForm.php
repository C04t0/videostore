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
            <h1>Delete a dvd</h1>
            <?php
                if ($success) {
            ?>
            <p class="success">Dvd has been successfully deleted!</p>
            <?php
            }
            ?>
            <table id="dvdOverview" class="overview">
                <tr>
                    <th>DVD Overview</th>
                </tr>
                <tr>
                    <?php foreach ($dvdList as $dvd) {
                        ?>
                        <td>

                            <?php
                                if ($dvd->isRented()) {
                                    echo "<b style='color: red'>" . $dvd->getId() . "</b>";
                                } else {
                                    echo $dvd->getId();
                                }

                            ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
            <form method="post" action="deleteDvd.php?action=process">
                <table>
                    <tr>
                        <td>Select a DVD id</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="dvdIdSelect" name="idSelect" required>
                                <option value="" hidden disabled selected>Choose dvd id</option>
                                <?php
                                    foreach ($dvdList as $dvd) {
                                        if (!$dvd->isRented()) {
                                        ?>
                                        <option value="<?php echo $dvd->getId(); ?>">
                                            <?php echo $dvd->getId(); ?>
                                        </option>
                                        <?php
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="submitBtn" type="submit" value="Delete DVD"></td>
                    </tr>
                </table>
            </form>
            <footer>
                <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
            </footer>
        </div>
    </body>
</html>
