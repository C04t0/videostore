
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
            <h1>Rent or return a dvd</h1>
            <section>
                <h2>Rent a dvd</h2>
                <?php if ($success == "rent") {
                    ?>
                <p class="success">DVD has been successfully rented!</p>
                <?php
                }
                ?>
                <form method="post" action="../rentReturnDvd.php?action=rent">
                    <input type="number" min="0">
                    <input type="submit" value="Rent">
                </form>
            </section>
            <section>
                <h2>Return a dvd</h2>
                <?php if ($success == "rent") {
                    ?>
                    <p class="success">DVD has been successfully returned!</p>
                    <?php
                }
                ?>
                <form method="post" action="../rentReturnDvd.php?action=return">
                    <input type="number" min="0">
                    <input type="submit" value="Return">
                </form>
            </section>
        </div>
    </body>
</html>
