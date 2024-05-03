<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Video Store</title>
        <!--<link rel="stylesheet" href="css/style.css"> -->
        <link rel="icon" href="img/icon.png">
        <style><?php include "css/style.css"?></style> <!-- avoid mime-type error -->
    </head>
    <body>
        <div id="wrapper" class="container">
            <section id="top">
                <h1>Video Store</h1>
                <h3>What would you like to do?</h3>
            </section>
            <section id="middleContent" class="middle">
                <span id="btnSpan" class="btnContainer">
                    <p id="allMoviesBtn">
                        <img class="btnImg" src="img/film.png" alt="Show all movies icon"><br>
                        <button class="menuBtn" onclick="location.href='movies.php?action=showAll'">Show all movies</button>
                    </p>
                    <p id="addMovieBtn">
                        <img class="btnImg" src="img/add-video.png" alt="Add movie icon"><br>
                        <button class="menuBtn" onclick="location.href='movies.php?action=addMovie'">Add a new movie</button>
                    </p>
                    <p id="findDvdBtn">
                        <img class="btnImg" src="img/question.png" alt="Find dvd icon">
                        <button class="menuBtn" onclick="location.href='movies.php?action=findDvd'">Find a dvd</button>
                    </p>
                    <p id="addDvdBtn">
                        <img class="btnImg" src="img/plus.png" alt="Add dvd icon">
                        <button class="menuBtn" onclick="location.href='movies.php?action=addDvd'">Add a new dvd</button>
                    </p>
                    <p id="deleteMovieBtn">
                        <img class="btnImg" src="img/clear.png" alt="Delete movie icon">
                        <button class="menuBtn" onclick="location.href='movies.php?action=deleteMovie'">Delete a movie</button>
                    </p>
                    <p id="deleteDvdBtn">
                        <img class="btnImg" src="img/clear.png" alt="Delete dvd icon">
                        <button class="menuBtn" onclick="location.href='movies.php?action=deleteDvd'">Delete a dvd</button>
                    </p>
                    <p id="rentDvdBtn">
                        <img src="img/rent64px.png" class="btnImg" alt="Rent dvd icon">
                        <button class="menuBtn" onclick="location.href='movies.php?action=rentDvd'">Rent a dvd</button>
                    </p>
                    <p id="returnDvdBtn">
                        <img class="btnImg" src="img/return64px.png" alt="Return dvd icon">
                        <button class="menuBtn" onclick="location.href='movies.php?action=returnDvd'">Return a dvd</button>
                    </p>
                </span>
            </section>
        </div>
    </body>
</html>
