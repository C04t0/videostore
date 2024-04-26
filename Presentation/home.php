<?php
    declare(strict_types=1);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <!--<link rel="stylesheet" href="css/style.css"> -->
        <link rel="icon" href="img/icon.png">
        <style><?php require_once "css/style.css"?></style> <!-- avoid mime-type error -->
    </head>
    <body>
        <div id="wrapper" class="container">
            <section id="top">
                <h1>Video Store</h1>
                <h3>What would you like to do?</h3>
            </section>
            <section id="middleContent" class="middle">
                <span id="btnSpan" class="btnContainer">
                    <button onclick="location.href='../movies.php?action=showAll'">Show all movies</button>
                    <button onclick="location.href='../movies.php?action=addMovie'">Add a new movie</button>
                    <button onclick="location.href='../movies.php?action=findDvd'">Find a dvd</button>
                    <button onclick="location.href='../movies.php?action=addDvd'">Add a new dvd</button>
                    <button onclick="location.href='../movies.php?action=deleteMovie'">Delete a movie</button>
                    <button onclick="location.href='../movies.php?action=deleteDvd'">Delete a dvd</button>
                    <button onclick="location.href='../movies.php?action=rentDvd'">Rent a dvd</button>
                    <button onclick="location.href='../movies.php?action=returnDvd'">Return a dvd</button>
                </span>
            </section>
        </div>
    </body>
</html>
