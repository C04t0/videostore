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
            <h1>Add a new movie title</h1>
            <?php
                if ($error === 'movieExists') {
                    ?>
            <p class="error">Title already exists!</p>
            <?php
                }
                if ($success) {
            ?>
            <p class="success">Movie title successfully added!</p>
            <?php
                }
            ?>
            <form method="post" action="../addMovie.php?action=process">
                <table>
                    <tr>
                        <td>Movie title: </td>
                        <td><input type="text" name="title" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Add movie title"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
