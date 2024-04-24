<?php
    declare(strict_types=1);
    namespace Presentation;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movies</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/icon.png">
    </head>
    <body>
        <div id="wrapper" class="container">
            <h1>Add a movie</h1>
            <?php
            if (isset($error) && $error === 'movieExists') {
                ?>
            <p id="error">Movie already exists in the database!</p>
            <?php
            }
            if (isset($succes) && $succes === 'true') {
                ?>
            <p id="success">Movie has been successfully added!</p>
            <?php
            }
            ?>
            <form method="post" action="../Presentation/addMovie.php">
                <table>
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Add movie title">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
