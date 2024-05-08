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
            <h1>Delete a dvd</h1>
            <?php echo generateDvdDeleteSuccess($success)?>
            <table id="dvdOverview" class="overview">
                <caption>DVD OVERVIEW</caption>
                <tr>
                    <th></th>
                </tr>
                <tr>
                    <?php echo generateDvdOverviewAvailableShown($dvdList); ?>
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
                                <?php echo generateDvdSelectAvailable($dvdList);?>
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
