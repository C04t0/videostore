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
    <style><?php include "css/style.css" ?></style>
</head>
<body>
<div id="wrapper" class="container">
    <h1>Find a dvd</h1>
    <?php echo generateDvdFoundSuccess($error, $success, $movie, $dvdList);?>
    <form method="post" action="findDvd.php?action=process">
        <table>
            <tr>
                <td>Select a dvd id</td>
            </tr>
            <tr>
                <td>
                    <select id="dvdIdSelect" name="idSelect" required>
                        <option value="" hidden disabled selected>Choose dvd id</option>
                        <?php echo generateDvdSelect($dvdList); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submitBtn" type="submit" value="Find DVD"</td>
            </tr>
        </table>
    </form>
    <footer>
        <button id="returnBtn" class="menuBtn" onclick="location.href='movies.php'">Return to main menu</button>
    </footer>
</div>
</body>
</html>