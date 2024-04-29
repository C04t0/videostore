<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <link rel="icon" href="img/icon.png">
        <style><?php require_once "css/style.css"?></style>
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>Find a dvd</h1>
                <form method="post" action="../findDvd.php?action=process">
                    <table>
                        <tr>
                            <td>Select a dvd id</td>
                        </tr>
                        <tr>
                            <select id="dvdIdSelect" name="idSelect" required>
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
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Find dvd"</td>
                        </tr>
                    </table>
                </form>
        </div>
    </body>
</html>