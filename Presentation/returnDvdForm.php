<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="../Presentation/img/icon.png">
        <style><?php include "css/style.css"?></style>
    </head>
    <body><div id="wrapper" class="container">

        <h1>Return a dvd</h1>
        <?php if ($success) {
            ?>
            <p class="success">DVD has been successfully returned!</p>
            <?php
        }
        ?>
        <form method="post" action="returnDvd.php?action=process">
            <select id="dvdReturnSelect" name="dvdSelect">
                <option value="" hidden disabled selected>Choose dvd id</option>
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
            <input class="submitBtn" type="submit" value="Return">
        </form>
        <footer>
            <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
        </footer>
    </div>
    </body>
</html>
