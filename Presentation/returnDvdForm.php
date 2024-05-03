<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="img/icon.png">
        <style><?php include "css/style.css"?></style>
    </head>
    <body>
    <section>
        <h2>Return a dvd</h2>
        <?php if ($success === "true") {
            ?>
            <p class="success">DVD has been successfully returned!</p>
            <?php
        }
        ?>
        <form method="post" action="../returnDvd.php?action=return">
            <select id="dvdReturnSelect" name="dvdReturnSelect">
                <option value="" selected>Choose dvd id</option>
                <?php
                    foreach ($dvdReturnList as $dvd) {
                        ?>
                        <option value="<?php echo $dvd->getId(); ?>">
                            <?php echo $dvd->getId(); ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" value="Return">
        </form>
    </section>
    <footer>
        <button onclick="location.href='movies.php'">Return to main menu</button>
    </footer>
    </body>
</html>
